<?php

declare(strict_types=1);

namespace App\Manager;

use App\Model\Entity;
use App\Model\VO\Uid;

/**
 * @template T of Entity
 */
interface EntityManager
{
    /**
     * Get the Entity corresponding to the provided id.
     *
     * @param Uid $id The id of the Entity.
     * @return T The Entity corresponding to the id.
     */
    public function getById(Uid $id): Entity;

    /**
     * Create and persist a new Entity.
     *
     * @param T $entity $news The Entity to persist.
     * @return T The persisted Entity.
     */
    public function create(Entity $entity): Entity;

    /**
     * Update a persisted Entity.
     *
     * @param T $entity The Entity to update.
     * @return T The updated Entity
     */
    public function update(Entity $entity): Entity;

    /**
     * Delete the provided Entity.
     *
     * @param T $entity $news The Entity to delete.
     * @return void
     */
    public function delete(Entity $entity): void;
}