<?php

declare(strict_types=1);

namespace App;

use App\Adapter\DatabaseAdapterInterface;
use App\Adapter\MySQLAdapter;
use App\Config\Config;
use App\Manager\EntityManager;
use App\Model\News;
use App\Model\VO\Uid;
use App\Repository\NewsRepository;

class NewsEntityManager implements EntityManager
{
    private readonly NewsRepository $repository;
    private readonly DatabaseAdapterInterface $adapter;

    public function __construct() {
        $config = Config::getDatabaseConfig();
        $this->adapter = new MysqlAdapter($config);
        $this->repository = new NewsRepository($this->adapter);
    }

    public function getById(Uid $id): News
    {
        return $this->repository->findById($id->getValue());
    }

    public function create(News $news): News
    {
        if (!$news->getId()) {
            $news->setId(Uid::generate());
        }
        $sql = "INSERT INTO news (id, content, created_at) VALUES (:id, :content, :created_at)";
        $this->adapter->execute($sql, [
            'id' => $news->getId()->getValue(),
            'content' => $news->getContent(),
            'created_at' => $news->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
        return $news;
    }

    public function update(News $news): News
    {
        $sql = "UPDATE news SET content = :content, created_at = :created_at WHERE id = :id";
        $this->adapter->execute($sql, [
            'id' => $news->getId(),
            'content' => $news->getContent(),
            'created_at' => $news->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
        return $this->repository->findById($news->getId()->getValue());
    }

    public function delete(News $news): void {
        $sql = "DELETE FROM news WHERE id = :id";
        $this->adapter->execute($sql, ['id' => $news->getId()->getValue()]);
    }
}