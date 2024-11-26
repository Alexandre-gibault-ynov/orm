<?php

declare(strict_types=1);

namespace App\Repository;

use App\Adapter\MySQLAdapter;
use App\Model\News;
use App\Model\VO\Uid;

final class NewsRepository
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

    public function save(News $news): void {
        if ($news->getId() === null) {
            $this->adapter->query(
                "INSERT INTO News (id, content, created_at) VALUES (:id, :content, :created_at)",
                [
                    'id' => $news->getId()->getValue(),
                    'content' => $news->getContent(),
                    'created_at' => $news->getCreatedAt()->format('Y-m-d H:i:s')
                ]
            );
        } else {
            $this->adapter->query(
                "UPDATE News SET content = :content, created_at = :created_at WHERE id = :id",
                [
                    'id' => $news->getId()->getValue(),
                    'content' => $news->getContent(),
                    'created_at' => $news->getCreatedAt()->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    public function delete(Uid $id): void {
        $this->adapter->query("DELETE FROM News WHERE id = :id", ['id' => $id->getValue()]);
    }
}