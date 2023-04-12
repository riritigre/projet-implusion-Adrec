<?php

use App\Connection;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Table\Table;


$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

if($post->getSlug() !== $slug){

   $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
   http_response_code(301);
   header('Location:' . $url);
}
?>


<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
<h1><?=e($post->getName()) ?></h1>

<?php foreach($post->getCategories() as $k => $category):
    if($k >0):
        echo ', ';
    endif;
    $categoryUrl= $router->url('category', ['id'=>$category->getID(), 'slug' => $category->getSlug()]);
    ?><a href="<?= $categoryUrl ?>"><?= e($category->getName())?></a><?php
endforeach ?>
<p><?= $post->getFormattedContent()?></p>
