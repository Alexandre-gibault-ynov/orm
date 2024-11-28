<?php

declare(strict_types=1);

namespace App\Config;

use Dotenv\Dotenv;

final class Config
{
    private static ?array $dbConfig = null;

    public static function loadEnv(string $path): void {
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->load();
    }

    public static function getDatabaseConfig(): array {
        if (self::$dbConfig === null) {
            self::$dbConfig = [
                'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
                'database' => $_ENV['DB_NAME'] ?? '',
                'username' => $_ENV['DB_USER'] ?? '',
                'password' => $_ENV['DB_PASS'] ?? '',
                'charset' => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
            ];
        }

        return self::$dbConfig;
    }
}