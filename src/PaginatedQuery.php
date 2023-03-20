<?php
namespace App;

use \PDO;

class PaginatedQuery
{

    private string $query;
    private string $queryCount;
    private PDO $pdo;
    private int $perPage;
    private  $count;
    private $items;
    private $PDO;

    public function __construct(
        string $query,
        string $queryCount,
        ?\PDO  $pdo = null,
        int    $perPage = 12


    )
    {
        $this->query = $query;
        $this->queryCount = $queryCount;
        $this->pdo = $pdo ?: Connection::getPDO();
        $this->perPage = $perPage;
    }

    public function getItems(string $classMapping): array
    {
        if ($this->items === null) {
            $currentPage = $this->getCurrentPage();
            $pages = $this->getPages();
            $offset = $this->perPage * ($currentPage - 1);
            $this->items = $this->pdo->query(
                $this->query .
                " LIMIT {$this->perPage} OFFSET $offset")
                ->fetchAll(PDO::FETCH_CLASS, $classMapping);
        }
        return  $this->items;
    }


    public function previousLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        if($currentPage <= 1) return null;
        if($currentPage > 2) $link .= "?page=" . ($currentPage -1);
        return <<<HTML
        <a href="{$link}" class="btn btn-primary ">&laquo; Page précédente</a>
        HTML;
    }
    public function nextLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        $pages = $this->getPages();
        if($currentPage >= $pages) return null;
        $link .= "?page=" . ($currentPage + 1);
        return <<<HTML
        <a href="{$link}" class="btn btn-primary ms-auto">Page suivante &raquo;</a>
        HTML;
    }

    public function getCurrentPage(): ?int
    {
        return URL::getInt('page', 1);
    }
    public function getPages (): int
    {
        if($this->count === null) {
            $this->count = (int)$this->pdo
                ->query($this->queryCount)
                ->fetch(PDO::FETCH_NUM)[0];
        }

        return ceil($this->count / $this->perPage);
    }

}