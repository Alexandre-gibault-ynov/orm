<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\UserService;
use Exception;

class UpdateUserCommand implements Command
{

    /**
     * @inheritDoc
     */
    public function execute(array $data): void
    {
        try {
            $userService = new UserService();
            $userService->updateUser($data);
            echo "OK\n";
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage() . "\n";
        }
    }
}