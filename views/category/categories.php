
<?php
use App\Connection;


$pdo = Connection::getPDO();

$query = $pdo->query('SELECT * FROM category');
$categories = $query->fetchAll(PDO::FETCH_OBJ);


?>




<style>
    .row{
        margin-left: -250px;
    }
</style>

    <div style="width: 68rem;">
        <STYLE>
            p{
                padding-left: 196px;
                text-align:center;
                font-size: 30px;
                font-family: Calibri;
                font-weight: bold;
                margin-bottom: 525px;
                margin-top: 90px;
               }
        </STYLE>

            <p>LES CATEGORIES</p>

    </div>
<style>
    .row{
       display: flex;
       justify-content: center;
       margin-left: 10px;
       gap:90px;
    }
</style>
    <div class="row">
    <?php  foreach($categories as $categorie): ?>
       <div class ="col-md-2">
           <style>

            </style>
            <div>
                <style>
                    .card-title{
                        text-align: center;
                        margin-left: 40px;
                        margin-top: -380px;
                        margin-bottom: 30px;
                        font-weight: bold;

                    }
                </style>
                <div>
                    <a href="" ><h3 class="card-title"><?= $categorie->name?></h3></a>
                </div>
            </div>
       </div>
    <?php endforeach ?>
    </div>







