<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\News;
use App\Model\VO\Uid;

interface Repository
{
    /**
     * Get an entity corresponding to the id.
     *
     * @param Uid $id The entity's id.
     * @return News|null The entity corresponding to the provided id.
     */
    public function getById(Uid $id): ?News;

    /**
     * Persist an entity.
     *
     * @param News $entity The entity to persist.
     * @return void
     */
    public function save(News $entity): void;


    /**
     * Delete the entity corresponding to the provided id.
     *
     * @param Uid $id The entity's id to delete.
     * @return void
     */
    public function delete(Uid $id): void;
}