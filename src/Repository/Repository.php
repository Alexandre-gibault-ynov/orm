<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Entity;
use App\Model\VO\Uid;

interface Repository
{
    public function getById(Uid $id): ?Entity;

    public function save(Entity $entity): void;

    public function delete(Uid $id): void;
}