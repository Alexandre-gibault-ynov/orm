<?php

declare(strict_types=1);

namespace App;

use App\Manager\EntityManager;
use App\Model\Entity;
use App\Model\VO\Uid;
use App\Repository\NewsRepository;

class NewsEntityManager implements EntityManager
{
    private NewsRepository $repository;

    public function __construct(NewsRepository $repository) {
        $this->repository = $repository;
    }

    public function getById(Uid $id): Entity
    {
        return $this->repository->getById($id);
    }

    public function create(Entity $entity): Entity
    {
        $this->repository->save($entity);
        return $entity;
    }

    public function update(Entity $entity): Entity
    {
        $this->repository->save($entity);
        return $entity;
    }

    public function delete(Entity $entity): void {
        $this->repository->delete($entity->getId());
    }
}