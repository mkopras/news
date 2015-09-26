<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app                 = new Silex\Application();
$app['rss_client'] = $app->share(function () {
    return new \Vinelab\Rss\Rss();
});

$app['news_fetcher'] = $app->share(function () use ($app) {
    return new \News\RSS\TVNFetcher($app['rss_client']);
});

$app->get('/v1/item/{number}', function ($number = 0) use ($app) {
    try {
        /** @var \News\RSS\Fetcher $fetcher */
        $fetcher = $app['news_fetcher'];

        return json_encode($fetcher->getLatest(1)[$number]);
    } catch (\Exception $e) {
        return json_encode(['error' => 'Problem with processing']);
    }
});

$app->get('/v1/list/{page}', function ($page) use ($app) {

    try {
        /** @var \News\RSS\Fetcher $fetcher */
        $fetcher = $app['news_fetcher'];

        return json_encode($fetcher->getLatest($page) );
    } catch (\Exception $e) {
        return json_encode(['error' => 'Problem with processing']);
    }
});

$app->run(); 
