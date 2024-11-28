<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\News;
use App\Model\VO\Uid;

interface NewsRepositoryinterface
{
    /**
     * Find an entity corresponding to the provided id.
     *
     * @param string $id The entity's id.
     * @return News|null The entity corresponding to the provided id.
     */
    public function findById(string $id): ?News;
}