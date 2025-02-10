<?php

declare(strict_types=1);


namespace App\Command;

use http\Exception\InvalidArgumentException;

class CommandStrategy
{
    /**
     * @var array<string, Command>
     */
    private array $commands = [];

    /**
     * Save a command in the strategy.
     *
     * @param CommandEnum $commandEnum Command enum.
     * @param Command $command Instance of the command
     * @return void
     */
    public function register(CommandEnum $commandEnum, Command $command): void {
        $this->commands[$commandEnum->value] = $command;
    }

    /**
     * Execute the command action.
     *
     * @param string $action Name of the command
     * @param array $data Data associated with the command
     * @return void
     */
    public function execute(string $action, array $data): void {
        if (!isset($this->commands[$action])) {
            throw new InvalidArgumentException("Action '$action' not supported.");
        }
        $this->commands[$action]->execute($data);
    }
}