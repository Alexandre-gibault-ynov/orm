<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\VO\Uid;
use DateTimeImmutable;

final class News
{
    private ?Uid $id;
    private string $content;
    private DateTimeImmutable $createdAt;

    public function __construct(array $data) {
        $this->id = $data['id'] ? new Uid($data['id']) : null;
        $this->content = $data['content'];
        $this->createdAt = new DateTimeImmutable($data['created_at']);
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getId(): ?Uid
    {
        return $this->id;
    }

    public function setId(?Uid $id): void
    {
        $this->id = $id;
    }
}