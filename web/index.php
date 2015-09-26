<?php

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new Silex\Application();
// $app['debug'] = true;

$app['news_fetcher'] = $app->share(function () {
    return new \News\RSS\Fetcher();
});

$app->get('/hello/{name}', function($name) use($app) { 
    return 'Hello '.$app->escape($name);
}); 

$app->run(); 
