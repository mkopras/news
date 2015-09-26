<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = false;
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

        $content =  json_encode($fetcher->getLatest(1)[$number]);
        return new \Symfony\Component\HttpFoundation\Response(
            $content,
            200,
            ['Content-Type' => 'application/json']
        );
    } catch (\Exception $e) {
        return json_encode(['error' => 'Problem with processing']);
    }
});

$app->get('/v1/list/{page}', function ($page) use ($app) {
    try {
        /** @var \News\RSS\Fetcher $fetcher */
        $fetcher = $app['news_fetcher'];

        $content = json_encode($fetcher->getLatest($page));
        return new \Symfony\Component\HttpFoundation\Response(
            $content,
            200,
            ['Content-Type' => 'application/json']
        );
    } catch (\Exception $e) {
        return json_encode(['error' => 'Problem with processing']);
    }
});

$app->run(); 
