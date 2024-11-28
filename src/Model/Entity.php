<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\VO\Uid;
use DateTimeInterface;


/**
 * Define a basic entity
 */
interface Entity
{
    /**
     * Return the Entity's id.
     *
     * @return Uid|null The entity's id
     */
    public function getId(): ?Uid;

    /**
     * set the entity's id.
     *
     * @param Uid $id The entity's id to set.
     * @return void
     */
    public function setId(Uid $id): void;

    /**
     * Return the entity's content.
     *
     * @return string The entity's content.
     */
    public function getContent(): string;

    /**
     * Set the entity's content.
     *
     * @param string $content The content to set.
     * @return void
     */
    public function setContent(string $content): void;

    /**
     * Return the entity's creation date.
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface;

    /**
     * Set the entity's creation date.
     *
     * @param DateTimeInterface $date The date to set.
     * @return void
     */
    public function setCreatedAt(DateTimeInterface $date): void;
}