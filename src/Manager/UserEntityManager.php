<?php

declare(strict_types=1);

namespace App\Manager;

use App\Adapter\DatabaseAdapter;
use App\Adapter\MySQLAdapter;
use App\Config\Config;
use App\Model\Entity;
use App\Model\User;
use App\Model\VO\Uid;
use App\Repository\Repository;
use App\Repository\UserRepository;
use DateTimeInterface;
use InvalidArgumentException;

final readonly class UserEntityManager implements EntityManager
{

    private Repository $repository;
    private DatabaseAdapter $adapter;

    function __construct()
    {
        $config = Config::getDatabaseConfig();
        $this->adapter = new MysqlAdapter($config);
        $this->repository = new UserRepository($this->adapter);
    }

    /**
     * @inheritDoc
     */
    public function getById(Uid $id): Entity
    {
        return $this->repository->findById($id->getValue());
    }

    /**
     * @inheritDoc
     */
    public function create(Entity $entity): Entity
    {
        $this->validateEntityType($entity);

        $sql = "INSERT INTO users (id, login, password, email, created_at)
                VALUES (:id, :login, :password, :email, :created_at)";

        if (!$entity->getId()) {
            $entity->setId(Uid::generate());
        }

        $this->adapter->execute($sql, [
            'id' => $entity->getId(),
            'login' => $entity->getLogin(),
            'password' => $entity->getPassword(),
            'email' => $entity->getEmail(),
            'created_at' => $entity->getCreatedAt()->format(DateTimeInterface::ATOM),
        ]);
        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function update(Entity $entity): Entity
    {
        $this->validateEntityType($entity);

        $sql = "UPDATE users SET login = :login, password = :password, email = :email WHERE id = :id";
        $this->adapter->execute($sql, [
            'id' => $entity->getId(),
            'login' => $entity->getLogin(),
            'password' => $entity->getPassword(),
            'email' => $entity->getEmail(),
        ]);

        return $this->repository->findById($entity->getId()->getValue());
    }

    /**
     * @inheritDoc
     */
    public function delete(Entity $entity): void
    {
        $this->validateEntityType($entity);

        $sql = "DELETE FROM users WHERE id = :id";
        $this->adapter->execute($sql, ['id' => $entity->getId()]);

        echo "OK\n";
    }

    /**
     * Use to validate the type of the entity used by the manager.
     * Throws a {@link InvalidArgumentException} if the given entity does not
     * correspond to its manager.
     *
     * @param Entity $entity The entity used by the manager.
     * @return void
     * @throws InvalidArgumentException
     */
    private function validateEntityType(Entity $entity): void
    {
        if (!$entity instanceof User) {
            throw new InvalidArgumentException("Expected instance of User.");
        }
    }
}