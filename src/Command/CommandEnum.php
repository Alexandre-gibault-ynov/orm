<?php

declare(strict_types=1);

namespace App\Command;

/**
 * Commands enum of the application.
 */
enum CommandEnum: string
{
    case ADD = 'add';
    case UPDATE = 'update';
    case DELETE = 'delete';

    /**
     * Associate the command with the corresponding class name.
     *
     * @return string Name of the class associated with the command.
     */
    public function getCommandClass(): string {
        return match ($this) {
            self::ADD => AddUserCommand::class,
            self::UPDATE => UpdateUserCommand::class,
            self::DELETE => DeleteUserCommand::class,
        };
    }
}
