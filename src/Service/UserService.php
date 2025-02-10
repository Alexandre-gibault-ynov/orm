<?php

declare(strict_types=1);

namespace App\Service;

use App\Manager\UserEntityManager;
use App\Model\User;
use App\Model\VO\Uid;
use DateTimeImmutable;
use InvalidArgumentException;

final class UserService
{
    private $userEntityManager;

    public function __construct()
    {
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
            $data['email]'],
            new DateTimeImmutable());

        $this->userEntityManager->create($user);

        // Notification
        $observer = new UserObserver();
        $observer->onUserAdded($user);

        return $user;
    }

    public function updateUser(array $user): void {
        // TODO
    }

    public function deleteUser(array $user): void {

    }
}