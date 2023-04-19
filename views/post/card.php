<?php
$categories = array_map(function ($category) use ($router) {
    $url= $router->url('category', ['id'=>$category->getID(), 'slug' => $category->getSlug()]);
    return  <<<HTML
    <a href="{$url}">{$category->getName()}</a>
HTML;
}, $post->getCategories());

?>

        <div class="card mb-3">
            <?php if ($post->getImage()): ?>
                <img src="<?= $post->getImageURL('small') ?>" class="card-img-top" alt="card-img">
            <?php endif ?>
            <div class="card-body">
                <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
                <h5 class="card-title"><?=htmlentities($post->getName()) ?></h5>
                <p>
                    <?php if (!empty($post->getCategories())): ?>
                    <?= implode(', ', $categories) ?>
                    <?php endif ?>
                    <style>
                        .card-text{
                            font-weight: normal;php
                        }
                    </style>
                <p class="card-text"><?=$post->getExcerpt()?></p>
                <style>
                    .btn-primary{
                        background-color: #EC6A20;
                        border-color: #EC6A20;
                    }
                </style>
                <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir plus</a>
            </div>
        </div>



