<?php

declare(strict_types=1);

namespace App\Command;

/**
 * Represent a command.
 */
interface Command
{
    /**
     * Execute the command
     *
     * @param array $data
     * @return void
     */
    public function execute(array $data): void;
}