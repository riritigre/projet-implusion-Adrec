<?php

use App\Connection;
use App\Model\Post;
use App\Router;


$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$query = $pdo ->prepare('SELECT * FROM post WHERE id= :id');
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Post::class);
/**@cvar Post|false */
$post= $query->fetch();
?>
<?php
if ($post === false){

    throw new Exception(print 'Erreur');
}

if($post->getSlug() !== $slug){

   $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
   http_response_code(301);
   header('Location:' . $url);
}
?>

<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
<h1><?=e($post->getName()) ?></h1>
<p ><?=$post->getFormattedContent()?></p>

