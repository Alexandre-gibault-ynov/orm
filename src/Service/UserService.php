<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\VO\Uid;
use DateTimeImmutable;
use InvalidArgumentException;

class UserService
{
    public function addUser(array $data): array {
        // Data validation
        if (empty($data['login']) || empty($data['password']) || empty($data['email'])) {
            throw new InvalidArgumentException("Missing required fields");
        }

        // Entity Creation
        $user = new User(null,
            $data['login'],
            password_hash($data['password'], PASSWORD_BCRYPT),
            $data['email]'],
            new DateTimeImmutable());

        $repository = new UserRepository();
        $repository->save($user);

        // Notification
        $observer = new UserObserver();
        $observer->onUserAdded($user);

        return $user->toArray();
    }

    public function updateUser(array $user): void {
        // TODO
    }
}