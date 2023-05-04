<?php
$categories = array_map(function ($category) use ($router) {
    $url= $router->url('category', ['id'=>$category->getID(), 'slug' => $category->getSlug()]);
    return  <<<HTML
    <a href="{$url}">{$category->getName()}</a>
HTML;
}, $post->getCategories());

?>


        <div >
            <?php if ($post->getImage()): ?>
                <img src="<?= $post->getImageURL('small') ?>" class="card-img-top" alt="card-img">
            <?php endif ?>
            <style>
                .card-body{
                    margin-top: 80px;
                    padding-left: -40px;
                    padding-right: 40px;
                    margin-right: 20px;

                }
            </style>
            <div class="card-body">
                <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
                <h4 class="card-title"><?=htmlentities($post->getName()) ?></h4>
                <p>
                    <?php if (!empty($post->getCategories())): ?>
                    <?= implode(', ', $categories) ?>
                    <?php endif ?>
                    <style>
                        .card-text{
                            font-weight: normal;
                            margin-top: 25px;
                            padding-right: 30px;

                        }
                    </style>
                <p class="card-text"><?=$post->getExcerpt()?></p>
                <style>
                    .btn-primary{
                        background-color: #EC6A20;
                        border-color: #EC6A20;
                        margin-bottom: 250px;
                    }
                </style>
                <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir l'article</a>
            </div>
        </div>



