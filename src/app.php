<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Command\CommandEnum;
use App\Command\CommandStrategy;
use App\Config\Config;
use App\Service\UserService;

if ($argc < 2) {
    echo "Usage: php app.php <command> <json_data>\n";
    exit(1);
}

Config::loadEnv(__DIR__ . '/../');

// Command name
$action = $argv[1];
// JSON data
$data = isset($argv[2]) ? json_decode($argv[2], true) : [];

if ($data === null && isset($argv[2])) {
    echo "Error: Invalid JSON format.\n";
    exit(1);
}

if (isset($args['action'])) {
    echo "Error: No action specified.\n";
    exit(1);
}

$userService = new UserService();
$strategy = new commandStrategy();

foreach (CommandEnum::cases() as $commandEnum) {
    $commandClass = $commandEnum->getCommandClass();
    $strategy->register($commandEnum, new $commandClass($userService));
}

// Exécuter la commande demandée
try {
    $strategy->execute($action, $data);
} catch (\Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
