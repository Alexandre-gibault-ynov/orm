<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\VO\Uid;
use DateTimeImmutable;


/**
 * Define a basic entity
 */
interface Entity
{
    public function getId(): ?Uid;
    public function setId(Uid $id): void;
    public function getContent(): string;
    public function setContent(string $content): void;
    public function getCreatedAt(): DateTimeImmutable;
    public function setCreatedAt(DateTimeImmutable $date): void;
}