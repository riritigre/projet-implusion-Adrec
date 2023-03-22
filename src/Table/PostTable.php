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

    public function findPaginated ()
    {

        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM post ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM post",
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
                       FROM post p
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