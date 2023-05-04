
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

if($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
?>
<style>
    .affichage{
        margin-top: 100px;
        margin-left: 26px;
    }
</style>
<div class ="affichage">
<h2><?= $post->getName() ?></h2>
    <style>
        .text-muted {
            font-size: 23px;
            font-family: Calibri, serif;
        }
        .taille{
            font-family: Calibri, serif;
            font-size: 25px;

        }
      }


    </style>
<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
<?php foreach($post->getCategories() as $k => $category):
    if ($k > 0):
        echo ', ';
    endif;
    $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);

    ?><a href="<?= $category_url ?>"><p class="taille"><?= $category->getName() ?></p></a><?php
endforeach ?>
<?php if ($post->getImage()): ?>
    <p>
        <img src="<?= $post->getImageURL('large') ?>" style="width: 100%">
    </p>
<?php endif ?>
<style>
    .paragraphe{
        margin-bottom: 456px;
        margin-top: 20px;
        font-size: 20px;
        font-family: Calibri, serif;
    }
</style>
<p class="paragraphe"><?= $post->getFormattedContent() ?></p>

</div>