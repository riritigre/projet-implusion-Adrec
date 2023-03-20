<?php

use App\helpers\Text;
use App\Model\Post;
use App\Router;
use App\Connection;
use App\URL;
use App\PaginatedQuery;


$title = 'Formation Implusion ADREC';
$pdo = Connection::getPDO();

$paginatedQuery = new PaginatedQuery(
        "SELECT * FROM post ORDER BY created_at DESC",
    "SELECT COUNT(id) FROM post",
   );

$posts = $paginatedQuery->getItems(Post::class);
$link = $router->url('home');
?>

<h1></h1>

<br>
<br>

<div class="row">
    <?php foreach($posts as $post): ?>

    <div class="col-md-3">
    <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4 " >
    <?=  $paginatedQuery->previousLink($link); ?>
    <?=  $paginatedQuery->nextLink($link); ?>
</div>

