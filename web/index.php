<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app                 = new Silex\Application();
$app['news_fetcher'] = $app->share(function () {
    return new \News\RSS\Fetcher();
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
