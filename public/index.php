<?php

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require '../vendor/autoload.php';

define('DEBUG TIME' , microtime(true));

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
/*$whoops->register();*/





$router = new App\Router(dirname(__DIR__) . '/views');
try {
    $router
        ->get('/', 'post/index', 'home')
        ->get('/blog/[*:slug]-[i:id]', 'post/show', "post")
        ->get('/blog/category', 'category/show', 'category')
        ->run();
} catch (Exception $e) {
}