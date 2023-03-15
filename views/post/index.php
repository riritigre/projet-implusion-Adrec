<?php

use App\helpers\Text;
use App\Model\Post;
use App\Router;


$title = 'Mon Blog formation';
$pdo = new PDO('mysql:dbname=implusionadrecblog; host=127.0.0.1:3306' , 'root', '' , [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$currentPage = $_GET['page'] ?? 1 ?: 1;
$count = $pdo->query('SELECT COUNT(id) FROM post')->fetch(PDO::FETCH_NUM)[0];
$perPage = 12;
$pages = ceil($count/$perPage);
$offset = $perPage * ($currentPage -1);
$query = $pdo->query(" SELECT * FROM post ORDER BY created_at DESC LIMIT  $perPage OFFSET $offset");
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class );

?>

<h1>Mon Blog </h1>

<br>
<br>

<div class="row">
    <?php foreach($posts as $post): ?>

    <div class="col-md-3">
    <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4">
    <?php if($currentPage > 1): ?>
    <a href="<?= $router->url('home') ?>?page=<?= $currentPage - 1 ?>" class="btn btn-primary">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if($currentPage < $pages): ?>
    <a href="<?= $router->url('home') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-primary ms-auto">Page suivante &raquo;</a>
    <?php endif ?>
</div>



