<?php

declare(strict_types=1);

namespace App;

use App\Manager\EntityManager;
use App\Model\News;
use App\Model\VO\Uid;
use App\Repository\NewsRepository;

class NewsEntityManager implements EntityManager
{
    private NewsRepository $repository;

    public function __construct(NewsRepository $repository) {
        $this->repository = $repository;
    }

    public function getById(Uid $id): News
    {
        return $this->repository->getById($id);
    }

    public function create(News $entity): News
    {
        $this->repository->save($entity);
        return $entity;
    }

    public function update(News $entity): News
    {
        $this->repository->save($entity);
        return $entity;
    }

    public function delete(News $entity): void {
        $this->repository->delete($entity->getId());
    }
}