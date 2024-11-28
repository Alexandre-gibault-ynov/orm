<?php

declare(strict_types=1);

namespace App\Manager;

use App\Model\News;
use App\Model\VO\Uid;

interface EntityManager
{
    /**
     * Get the Entity corresponding to the provided id.
     *
     * @param Uid $id The id of the Entity.
     * @return News The Entity corresponding to the id.
     */
    public function getById(Uid $id): News;

    /**
     * Create and persist a new Entity.
     *
     * @param News $entity The Entity to persist.
     * @return News The persisted Entity.
     */
    public function create(News $entity): News;

    /**
     * Update a persisted Entity.
     *
     * @param News $entity The Entity to update.
     * @return News The updated Entity
     */
    public function update(News $entity): News;

    /**
     * Delete the provided Entity.
     *
     * @param News $entity The Entity to delete.
     * @return void
     */
    public function delete(News $entity): void;
}