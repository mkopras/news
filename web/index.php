<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app          = new Silex\Application();
$app['debug'] = 'true';

$app->get('/v1/item/{number}', function ($number) use ($app) {
    $itemStub = [
        'title'      => 'Nius',
        'content'    => 'costam',
        'link'       => 'http://onet.pl',
        'lang'       => 'PL',
        'created_at' => date('Y-m-d'),
    ];

    return json_encode($itemStub);
});

$app->get('/v1/list/{page}', function ($page) use ($app) {
    $itemStub   = [
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
});

$app->run(); 
