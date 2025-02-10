<?php

declare(strict_types=1);

namespace App\Service;

use App\Manager\UserEntityManager;
use App\Model\User;
use App\Model\VO\Uid;
use App\Observer\UserObserver;
use DateTimeImmutable;
use Exception;
use InvalidArgumentException;

final class UserService
{
    private $userEntityManager;
    private $observer;

    public function __construct()
    {
        $this->observer = new UserObserver();
        $this->userEntityManager = new UserEntityManager();
    }

    public function addUser(array $data): User
    {
        // Data validation
        if (empty($data['login']) || empty($data['password']) || empty($data['email'])) {
            throw new InvalidArgumentException("Missing required fields");
        }

        // Entity Creation
        $user = new User(Uid::generate(),
            $data['login'],
            password_hash($data['password'], PASSWORD_BCRYPT),
            $data['email'],
            new DateTimeImmutable());

        $this->userEntityManager->create($user);

        // Notification
        $observer = new UserObserver();
        $observer->onUserAdded($user);

        return $user;
    }

    public function updateUser(array $user): void {
        if (empty($data['id'])) {
            throw new InvalidArgumentException("User ID is required.");
        }

        $user = $this->userEntityManager->getById($data['id']);
        if (!$user) {
            throw new Exception("User not found.");
        }

        if (!empty($data['login'])) {
            $user->setLogin($data['login']);
        }
        if (!empty($data['password'])) {
            $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
        }
        if (!empty($data['email'])) {
            $user->setEmail($data['email']);
        }

        $this->userEntityManager->update($user);

        $this->observer->onUserUpdated($user);
    }

    public function deleteUser(array $user): void {
        if (empty($data['id'])) {
            throw new InvalidArgumentException("User ID is required.");
        }

        $user = $this->userEntityManager->getById($data['id']);
        if (!$user) {
            throw new Exception("User not found.");
        }

        $this->userEntityManager->delete($user);
    }
}