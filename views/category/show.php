<?php

use App\Connection;
use App\Model\Post;
use App\PaginatedQuery;
use App\Model\Category;
use App\Router;



$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$query = $pdo ->prepare('SELECT * FROM category WHERE id= :id');
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
/**@cvar Category|false */
$category= $query->fetch();


?>
<?php
if($category->getSlug() !== $slug){

    $url = $router->url('category', ['slug' => $category->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location:' . $url);
}

$title = "Catégorie {$category->getName()}";

$paginatedQuery = new PaginatedQuery(
    "SELECT P.*
    FROM post p
    JOIN post_category pc ON p.id = pc.post_id
    WHERE pc.category_id =  {$category->getID()}
    ORDER BY created_at DESC",
    "SELECT COUNT(id) FROM post",
);


/** @var Post[] $paginatedQuery */
$posts = $paginatedQuery->getItems(Post::class);
$link = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
?>

<h1><?= e($title)?></h1>

<div class="row">
    <?php foreach($posts as $post): ?>

        <div class="col-md-3">
            <?php require dirname(__DIR__) . '/post/card.php' ?>
        </div>
    <?php endforeach ?>
</div>


<div class="d-flex justify-content-between my-4 " >
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>