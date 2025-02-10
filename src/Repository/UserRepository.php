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
        try {
            $createdAt = new DateTimeImmutable($data['created_at']);
        } catch (DateMalformedStringException $e) {
            echo "Error: " . $e->getMessage();
        }

        return new User(
            $entityId,
            $login,
            $password,
            $email,
            $createdAt
        );
    }
}