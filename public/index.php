<?php

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require '../vendor/autoload.php';

define('DEBUG TIME' , microtime(true));

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
/*$whoops->register();*/

function e (string $string):string{
    return htmlentities($string);
}

if (isset($_GET['page']) && $_GET['page'] === '1') {
    $url = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($_GET['page']);
    $query = http_build_query($_GET);
    if(!empty($query)) {
        $url = $url . '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $url);
    exit();
}



$router = new App\Router(dirname(__DIR__) . '/views');
try {
    $router
        ->get('/', 'post/index', 'home')
        ->get('/blog/category/[*:slug]-[i:id]', 'category/show', 'category')
        ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
        ->run();
} catch (Exception $e) {
}