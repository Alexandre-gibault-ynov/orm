<?php

declare(strict_types=1);

namespace App\Service;

class LogService
{
    private string $logFile;

    public function __construct() {
        $this->logFile = __DIR__ . '/../../logs/app.log';
    }

    public function log(string $message): void {
        $date = date('Y-m-d H:i:s');
        file_put_contents($this->logFile, "[$date] $message\n", FILE_APPEND);
    }
}