
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
                <h5 class="card-title"><?=htmlentities($post->getName()) ?></h5>
                <p class="card-text"><?=$post->getExcerpt()?></p>
                <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir plus</a>
            </div>
        </div>



