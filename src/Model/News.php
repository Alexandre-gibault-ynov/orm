<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\VO\Uid;
use DateTimeImmutable;
use DateTimeInterface;

final class News implements Entity
{
    /**
     * @var Uid|null The news entity's id.
     */
    private ?Uid $id;

    /**
     * The news entity content.
     *
     * @var string
     */
    private string $content;

    /**
     * The news entity creation date.
     *
     * @var DateTimeInterface
     */
    private DateTimeInterface $createdAt;

    public function __construct(?Uid $id, string $content, DateTimeInterface $createdAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $date): void
    {
        $this->createdAt = $date;
    }

    /**
     * Get the news content.
     *
     * @return string The news content.
     */
    public function getContent(): string
    {
        return $this->content;
    }


    /**
     * Set the news content.
     *
     * @param string $content The news content to set.
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getId(): ?Uid
    {
        return $this->id;
    }

    public function setId(Uid $id): void
    {
        $this->id = $id;
    }
}