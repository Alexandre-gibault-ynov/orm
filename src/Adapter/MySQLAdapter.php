<?php

declare(strict_types=1);

namespace App\Adapter;

use PDO;
use PDOStatement;

final class MySQLAdapter {
    private static ?self $instance = null;
    private PDO $connection;

    private function __construct(array $config) {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $config['host'], $config['database'], $config['charset']);
        $this->connection = new PDO($dsn, $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(array $config): self {
        if (!self::$instance) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function query(string $sql, array $params = []): PDOStatement {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}