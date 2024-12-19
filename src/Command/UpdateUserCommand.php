<?php

namespace App\Command;

use App\Command\Command;
use App\Service\UserService;

class UpdateUserCommand implements Command
{

    /**
     * @inheritDoc
     */
    public function execute(array $data): void
    {
        try {
            $userService = new UserService();
            $user = $userService->updateUser($data);
            echo json_encode($user, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
        }
    }
}