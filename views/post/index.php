<?php


use App\Connection;
use App\Table\PostTable;



$title = 'Mon Blog';
$pdo = Connection::getPDO();

$table = new PostTable($pdo);
[$posts, $pagination] = $table->findPaginated();

$link = $router->url('home');

?>
<style>
    .card{
        margin-bottom: 30px;
    }
</style>
<div class="card" style="width: 38rem;">
    <img src="https://www.adrec-formation.fr/wp-content/uploads/2018/02/clermont.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <style>
            .card-text{
                font-size: 20px;
                font-family: Calibri, serif;
                font-weight: bold;
                margin: auto ;
            }
        </style>
          <p class="card-text1">Impulsion est une formation à destination des personnes en situation de fragilité au regard du marché du travail et pour lesquels les ingénieries pédagogiques classiques n’ont pas permis de développer les compétences nécessaires à la qualification, voire, ont installé une défiance vis-à-vis de tout processus formel d’apprentissage. Et pour lesquels l’accès direct à une formation certifiante ou professionnalisante n’est pas envisageable.</p>
    </div>
</div>



<div class="row">
    <?php foreach($posts as $post): ?>
        <div class="col-md-3">
            <?php require 'card.php' ?>
        </div>
    <?php endforeach ?>
</div>


<div class="d-flex justify-content-between my-4 " >
    <?=  $pagination->previousLink($link); ?>
    <?=  $pagination->nextLink($link); ?>
</div>
