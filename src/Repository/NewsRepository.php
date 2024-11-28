<?php

declare(strict_types=1);

namespace App\Repository;

use App\Adapter\DatabaseAdapterInterface;
use App\Model\DTO\NewsDTO;
use App\Model\News;
use App\Model\VO\Uid;
use DateMalformedStringException;
use DateTimeImmutable;
use PDO;

final class NewsRepository implements NewsRepositoryinterface
{
    private DatabaseAdapterInterface $adapter;

    public function __construct(DatabaseAdapterInterface $adapter) {
        $this->adapter = $adapter;
    }

    /**
     * @param string $id
     * @return News|null
     * @throws DateMalformedStringException
     */
    public function findById(string $id): ?News {
        $sql = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->adapter->query($sql, ['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $id = isset($data['id']) ? new Uid($data['id']) : null;
        $content = $data['content'];
        $createdAt = new DateTimeImmutable($data['created_at']);

        $newsDto = new NewsDTO($id, $content, $createdAt);

        return new News($newsDto);
    }
}