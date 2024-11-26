<?php

declare(strict_types=1);

namespace App;

use App\Model\News;
use App\Model\VO\Uid;
use App\Repository\NewsRepository;

class NewsEntityManager
{
    private NewsRepository $repository;

    public function __construct(NewsRepository $repository) {
        $this->repository = $repository;
    }

    public function getById(Uid $id): News {
        return $this->repository->getById($id);
    }

    public function create(News $news): News {
        $this->repository->save($news);
        return $news;
    }

    public function update(News $news): News {
        $this->repository->save($news);
        return $news;
    }

    public function delete(News $news): void {
        $this->repository->delete($news->getId());
    }
}