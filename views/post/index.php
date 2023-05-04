


<?php


use App\Connection;
use App\Table\PostTable;




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



<style>
    .row{
        margin-left: -250px;
    }
</style>
<div class="row">

    <div style="width: 48rem;">
        <STYLE>
            h2{
                text-align: center;
                margin-top: -20px ;
                margin-bottom: 18px;
                font-family: Calibri;
                font-weight: bold;


            }
        </STYLE>
        <h2>La formation Impulsion ADREC</h2>
        <img src="https://www.adrec-formation.fr/wp-content/uploads/2018/02/clermont.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <style>
                .card-text1{
                    font-size: 22px;
                    font-family: Calibri, serif;
                    font-weight: bold;
                    text-align: justify;
                    margin-top: 28px;
                    margin-bottom: 60px;
                    margin-right: -61px;
                    
                }
            </style>
            <p class="card-text1">Impulsion est une formation à destination des personnes en situation de fragilité au regard du marché du travail et pour lesquels les ingénieries pédagogiques classiques n’ont pas permis de développer les compétences nécessaires à la qualification, voire, ont installé une défiance vis-à-vis de tout processus formel d’apprentissage. Et pour lesquels l’accès direct à une formation certifiante ou professionnalisante n’est pas envisageable.</p>
        </div>
    </div>

    <?php foreach($posts as $post): ?>
    <style>
        .col-md-3{
            margin-top: 25px;
            margin-bottom: 70px;

        }
    </style>
        <div class="col-md-3">
            <?php require 'card.php' ?>
        </div>
    <?php endforeach ?>
</div>

<style>
    a.btn.btn-primary{
        margin-bottom: 40px;
       margin-top: 5px;

    }
</style>

<div class="d-flex justify-content-between my-4 " >
    <?=  $pagination->previousLink($link); ?>
    <?=  $pagination->nextLink($link); ?>
</div>
