<?php

namespace App\Table;

use App\PaginatedQuery;
use App\Model\Post;
use App\Model\Category;
use App\Table\Exception\NotFoundException;
use \PDO;

/**
 * @method findPaginedForCategory(int|null $getID)
 */
final class PostTable extends Table {

    protected $table = "post";
    protected $class = Post::class;

    public function update (Post $post):void
    {
        $query = $this->pdo->prepare("UPDATE $this->table SET name = :name, slug =:slug, created_at = :created, content = :content,  WHERE id = :id");
        $ok = $query->execute([

            'id' => $post->getID(),
            'name' => $post->getName(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'created' => $post->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        if ($ok === false) {
            throw new\Exception("impossible de supprimer l'enregistrement $id dans la table ($this->table)");
        }

    }
    public function delete (int $id):void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");


    }
    public function findPaginated ()
    {

        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM {$this->table}",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];

    }
    public function findPaginatedForCategory(int $categoryID)
    {

        $paginatedQuery = new PaginatedQuery(
            "SELECT P.*
                       FROM {$this->table} p
                       JOIN post_category pc ON p.id = pc.post_id
                       WHERE pc.category_id =  {$categoryID}
                       ORDER BY created_at DESC",
            "SELECT COUNT(category_id) FROM post_category WHERE category_id = {$categoryID}"
        );


        /** @var Post[] $paginatedQuery */
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

}