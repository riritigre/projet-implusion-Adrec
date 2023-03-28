<?php

namespace App\Model;

use  App\helpers\Text;
use \DateTime;
use http\QueryString;


class Post {

    private int $id;

    private string $slug;

    private string $name;

    private string $content;

    private  string $created_at;

    private $categories = [];

    public function getName (): ?string
    {
        return $this->name;
    }

    public function setName ( string  $name):self
    {
        $this->name = $name;

        return $this;
    }

    public function getContent (): ?string
    {
        return $this->content;


    }
    public function setContent ( string  $content):self
    {
        $this->content = $content;

        return $this;
    }
       public function getFormattedContent(): ?string
    {
        return nl2br(e($this->content));
    }
    public function getExcerpt (): ?string
    {
        if ($this->content === null) {
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->content, 60)));
    }
    public function getCreatedAt ():DateTime
    {
        return new DateTime($this->created_at);
    }
    public function setCreatedAt (string $date): self
    {
        $this->created_at = $date;

        return $this;
    }

    public function getSlug (): ?string
    {
        return $this->slug;
    }

    public function setSlug (string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }


    public function getID (): ?int
    {
        return $this->id;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
    public function addCategory (Category $category): void
    {

        $this->categories[] = $category;
        $category->setPost($this);
    }

}

