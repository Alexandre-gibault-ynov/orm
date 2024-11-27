<?php

namespace App\Model\DTO;

use App\Model\VO\Uid;
use DateTimeImmutable;

class NewsDTO
{
    public ?Uid $id;
    public string $content;
    public DateTimeImmutable $createdAt;

    public function __construct(
        ?Uid $id,
        string $content,
        DateTimeImmutable $createdAt
    ) {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }
}