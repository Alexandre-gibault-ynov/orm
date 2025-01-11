<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Entity;


/**
 * @template T of Entity
 */
interface Repository
{
    /**
     * Find an entity corresponding to the provided id.
     *
     * @param string $id The entity's id.
     * @return T The entity corresponding to the provided id.
     */
    public function findById(string $id): ?Entity;
}