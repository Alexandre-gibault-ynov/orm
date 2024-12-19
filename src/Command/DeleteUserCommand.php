<?php

namespace App\Command;

use App\Command\Command;

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
            echo json_encode(['message' => 'User deleted successfully'], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
        }
    }
}