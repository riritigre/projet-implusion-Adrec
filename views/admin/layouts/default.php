<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
<style>
    nav{
        background: #EC6A20;
        color: white;
    }
    .nav-link{
        color:white;
        font-size: 18px;
        margin-right: 15px;
        font-family: "Calibri Light", serif;
        font-weight: bolder;
    }
    a.navbar-brand{
     font-weight: bold ;
     font-size: 22px;
     font-family: Calibri;
     margin-right: 35px;
    }
    .navbar-brand{

    }
</style>
<nav class="navbar navbar-expand-lg  ">

    <a  class="navbar-brand">Administration</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="<?= $router->url('admin_posts') ?>" class="nav-link">Articles</a>
        </li>
        <li class="nav-item">
            <a href="<?= $router->url('admin_categories') ?>" class="nav-link">Catégories</a>
        </li>
        <li class="nav-item">
            <form action="<?= $router->url('logout') ?>" method="post" style="display:inline">
                <style>
                button.nav-link{
                    margin-left: 1318px;

                }
                </style>
            <button type="submit" class= "nav-link" style="background:#696969; border:none;">Se déconnecté</button>
            </form>
        </li>
    </ul>
</nav>

<div class="container mt-4">
    <?= $content ?>
</div>


</body>
</html>
