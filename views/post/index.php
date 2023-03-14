<?php

use App\helpers\Text;
use App\Model\Post;
use App\Router;
use App\Connection;
use App\URL;


$title = 'Formation Implusion ADREC';
$pdo = Connection::getPDO();

$currentPage = URL::getInt('page' , 1);

$count = $pdo->query('SELECT COUNT(id) FROM post')->fetch(PDO::FETCH_NUM)[0];
$perPage = 12;
$pages = ceil($count/$perPage);
$offset = $perPage * ($currentPage -1);
$query = $pdo->query(" SELECT * FROM post ORDER BY created_at DESC LIMIT  $perPage OFFSET $offset");
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class );

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
<!--justify-content-between => il prend tout les élément et il les places aux extremité-->
<!--justify-content-end => il prend tous les élément et les met à droite-->
<!--donc à toi de faire tes conditions sur tes classes en fonction des boutons qui s'affiche, ok ? -->


<div class="d-flex justify-content-between my-4 " >
    <?php if($currentPage > 1): ?>
      <?php
     $link = $router->url('home');
     if($currentPage > 2) $link .='?page=' . $currentPage - 1;
     ?>
      <a href="<?= $link ?>" class="btn btn-primary">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if($currentPage < $pages): ?>
      <a href="<?= $router->url('home') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-primary ms-auto" >Page suivante &raquo;</a>
    <?php endif ?>

</div>

