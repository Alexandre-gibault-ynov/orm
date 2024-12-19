<?php

declare(strict_types=1);

namespace App\Command;

use App\Command\Command;
use App\Service\UserService;

class AddUserCommand implements Command
{

    /**
     * @inheritDoc
     */
    public function execute(array $data): void
    {
        try {
            $userService = new UserService();
            $user = $userService->addUser($data);
            echo json_encode($user, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
        }
    }
}