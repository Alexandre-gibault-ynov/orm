<?php

declare(strict_types=1);

namespace App\Adapter;

use PDOStatement;

interface DatabaseAdapterInterface
{
    /**
     * Database reading operations.
     *
     * @param string $sql
     * @param array $params
     * @return PDOStatement
     */
    public function query(string $sql, array $params = []): PDOStatement;

    /**
     * Database writing operations.
     *
     * @param string $sql
     * @param array $params
     * @return int
     */
    public function execute(string $sql, array $params = []): int;
}