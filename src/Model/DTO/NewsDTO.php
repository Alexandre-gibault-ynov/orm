<?php

namespace App\Model\DTO;

use App\Model\VO\Uid;
use DateTimeImmutable;

class NewsDTO
{
    /**
     * The id of the DTO
     *
     * @var Uid|null
     */
    private ?Uid $id;

    /**
     * The DTO content
     *
     * @var string
     */
    private string $content;

    /**
     * @var DateTimeImmutable The date of creation of the entity.
     */
    private DateTimeImmutable $createdAt;

    public function __construct(?Uid $id, string $content, DateTimeImmutable $createdAt) {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    /**
     * Return the DTO id.
     *
     * @return Uid|null The DTO id.
     */
    public function getId(): ?Uid {
        return $this->id;
    }

    /**
     * Set the DTO id.
     *
     * @param Uid $id The DTO id to set.
     * @return NewsDTO
     */
    public function setId(Uid $id): void {
        $this->id = $id;
    }

    /**
     * Return the DTO content.
     *
     * @return string The DTO content
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * Set the DTO content.
     *
     * @param string $content The content to set.
     * @return NewsDTO
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Get the creation date.
     *
     * @return DateTimeImmutable The date of creation of the entity.
     */
    public function getCreatedAt(): DateTimeImmutable {
        return $this->createdAt;
    }

    /**
     * Set the creation date.
     *
     * @param DateTimeImmutable $createdAt The creadate to set.
     * @return NewsDTO
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}