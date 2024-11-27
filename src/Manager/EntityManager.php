<?php

declare(strict_types=1);

namespace App\Manager;

use App\Model\Entity;
use App\Model\VO\Uid;

interface EntityManager
{
    /**
     * Get the Entity corresponding to the provided id.
     *
     * @param Uid $id The id of the Entity.
     * @return Entity The Entity corresponding to the id.
     */
    public function getById(Uid $id): Entity;

    /**
     * Create and persist a new Entity.
     *
     * @param Entity $entity The Entity to persist.
     * @return Entity The persisted Entity.
     */
    public function create(Entity $entity): Entity;

    /**
     * Update a persisted Entity.
     *
     * @param Entity $entity The Entity to update.
     * @return Entity The updated Entity
     */
    public function update(Entity $entity): Entity;

    /**
     * Delete the provided Entity.
     *
     * @param Entity $entity The Entity to delete.
     * @return void
     */
    public function delete(Entity $entity): void;
}