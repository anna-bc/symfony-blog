<?php
namespace App\Entity;

class Author
{
    private string $authorName;

    public function __construct(string $authorName)
    {
        $this->authorName = $authorName;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }
}
