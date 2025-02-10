<?php

declare(strict_types=1);

namespace App\Repository;

use App\Adapter\DatabaseAdapter;
use App\Model\Entity;
use App\Model\User;
use App\Model\VO\Uid;
use DateMalformedStringException;
use DateTimeImmutable;
use PDO;

final class UserRepository implements Repository
{
    private DatabaseAdapter $adapter;

    function __construct(DatabaseAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @inheritDoc
     * @throws DateMalformedStringException
     */
    public function findById(string $id): ?Entity
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->adapter->query($sql, ['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $entityId = isset($data['id']) ? new Uid($data['id']) : null;
        $login = $data['login'];
        $password = $data['password'];
        $email = $data['email'];
        $createdAt = new DateTimeImmutable($data['created_at']);

        return new User(
            $entityId,
            $login,
            $password,
            $email,
            $createdAt
        );
    }
}