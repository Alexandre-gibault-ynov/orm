<?php

declare(strict_types=1);

namespace App\Repository;

use App\Adapter\MySQLAdapter;
use App\Model\Entity;
use App\Model\News;
use App\Model\VO\Uid;
use PDO;

final class NewsRepository implements Repository
{
    private MySQLAdapter $adapter;

    public function __construct(MySQLAdapter $adapter) {
        $this->adapter = $adapter;
    }

    public function getById(Uid $id): ?News {
        $stmt = $this->adapter->query("SELECT * FROM News WHERE id = :id", ['id' => $id->getValue()]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new News($data) : null;
    }

    public function save(Entity $entity): void {
        if ($entity->getId() === null) {
            $id = Uid::generate();
            $entity->setId($id);

            $this->adapter->query(
                "INSERT INTO News (id, content, created_at) VALUES (:id, :content, :created_at)",
                [
                    'id' => $entity->getId()->getValue(),
                    'content' => $entity->getContent(),
                    'created_at' => $entity->getCreatedAt()->format('Y-m-d H:i:s')
                ]
            );
        } else {
            $this->adapter->query(
                "UPDATE News SET content = :content, created_at = :created_at WHERE id = :id",
                [
                    'id' => $entity->getId()->getValue(),
                    'content' => $entity->getContent(),
                    'created_at' => $entity->getCreatedAt()->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    public function delete(Uid $id): void {
        $this->adapter->query("DELETE FROM News WHERE id = :id", ['id' => $id->getValue()]);
    }
}