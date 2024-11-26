<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\VO\Uid;
use DateTimeImmutable;

final class News implements Entity
{
    /**
     * @var Uid|null The news entity's id.
     */
    private ?Uid $id;

    /**
     * The news entity content.
     *
     * @var string|mixed
     */
    private string $content;

    /**
     * The news entity creation date.
     *
     * @var DateTimeImmutable
     */
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

    public function setCreatedAt(DateTimeImmutable $date): void
    {
        $this->createdAt = $date;
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