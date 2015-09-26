<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app          = new Silex\Application();
$app['debug'] = 'true';

$app->get('/v1/item/{number}', function ($number) use ($app) {
    try {

        $itemStub = [
            'title'      => 'Nius',
            'content'    => 'costam',
            'link'       => 'http://onet.pl',
            'lang'       => 'PL',
            'created_at' => date('Y-m-d'),
        ];

        return json_encode($itemStub);
    } catch (\Exception $e) {
        return json_encode(['error' => 'Problem with processing']);
    }
});

$app->get('/v1/list/{page}', function ($page) use ($app) {
    try {
        $itemStub = [
            'title'      => 'Nius',
            'content'    => 'costam',
            'link'       => 'http://onet.pl',
            'lang'       => 'PL',
            'created_at' => date('Y-m-d'),
        ];

        $collection = [];
        for ($i = 0; $i < 10; $i++) {
            $collection[] = $itemStub;
        }

        return json_encode($collection);
    } catch (\Exception $e) {
        return json_encode(['error' => 'Problem with processing']);
    }
});
$app['news_fetcher'] = $app->share(function () {
    return new \News\RSS\Fetcher();
});

$app->get('/hello/{name}', function($name) use($app) { 
    return 'Hello '.$app->escape($name);
}); 

$app->run(); 
