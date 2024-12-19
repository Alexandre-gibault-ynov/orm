<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Command\AddUserCommand;
use App\Command\UpdateUserCommand;
use App\Command\DeleteUserCommand;

$args = getopt('', ['action:', 'data:']);

if (isset($args['action'])) {
    echo "Error: No action specified.\n";
    exit(1);
}

$action = $args['action'];
$data = isset($args['data']) ? json_decode($args['data']) : null;

switch ($action) {
    case 'add':
        $command = new AddUserCommand();
        $command->execute($data);
        break;
    case 'update':
        $command = new UpdateUserCommand();
        $command->execute($data);
        break;
    case 'delete':
        $command = new DeleteUserCommand();
        $command->execute($data);
        break;
    default:
        echo "Error: Invalid action.\n";
}
