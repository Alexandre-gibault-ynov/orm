<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\UserService;
use Exception;

class DeleteUserCommand implements Command
{

    /**
     * @inheritDoc
     */
    public function execute(array $data): void
    {
        try {
            $userService = new UserService();
            $userService->deleteUser($data['id']);
            echo "OK\n";
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage() . "\n";
        }
    }
}