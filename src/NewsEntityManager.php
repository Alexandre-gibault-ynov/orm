<?php

declare(strict_types=1);

namespace App;

use App\Adapter\DatabaseAdapter;
use App\Adapter\MySQLAdapter;
use App\Config\Config;
use App\Manager\EntityManager;
use App\Model\Entity;
use App\Model\VO\Uid;
use App\Repository\NewsRepository;
use DateMalformedStringException;

final class NewsEntityManager implements EntityManager
{
    private readonly NewsRepository $repository;
    private readonly DatabaseAdapter $adapter;

    public function __construct() {
        $config = Config::getDatabaseConfig();
        $this->adapter = new MysqlAdapter($config);
        $this->repository = new NewsRepository($this->adapter);
    }

    /**
     * @inheritdoc
     * @throws DateMalformedStringException
     */
    public function getById(Uid $id): Entity
    {
        return $this->repository->findById($id->getValue());
    }

    public function create(Entity $entity): Entity
    {
        if (!$entity->getId()) {
            $entity->setId(Uid::generate());
        }
        $sql = "INSERT INTO news (id, content, created_at) VALUES (:id, :content, :created_at)";
        $this->adapter->execute($sql, [
            'id' => $entity->getId()->getValue(),
            'content' => $entity->getContent(),
            'created_at' => $entity->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
        return $entity;
    }

    public function update(Entity $entity): Entity
    {
        $sql = "UPDATE news SET content = :content, created_at = :created_at WHERE id = :id";
        $this->adapter->execute($sql, [
            'id' => $entity->getId()->getValue(),
            'content' => $entity->getContent(),
            'created_at' => $entity->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
        return $this->repository->findById($entity->getId()->getValue());
    }

    public function delete(Entity $entity): void {
        $sql = "DELETE FROM news WHERE id = :id";
        $this->adapter->execute($sql, ['id' => $entity->getId()->getValue()]);
    }
}