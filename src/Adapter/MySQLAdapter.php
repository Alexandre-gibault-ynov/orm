<?php

declare(strict_types=1);

namespace AlexandreGibault\Orm\Adapter;

use PDO;
use PDOStatement;

final class MySQLAdapter
{
    private static ?MySQLAdapter $instance = null;
    private PDO $connection;

    private function __construct(array $config) {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $this->connection = new PDO($dsn, $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(array $config): MySQLAdapter {
        if (self::$instance === null) {
            self::$instance = new MySQLAdapter($config);
        }
        return self::$instance;
    }

    public function query(string $sql, array $params = []): PDOStatement {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}