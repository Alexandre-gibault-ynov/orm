<?php

declare(strict_types=1);

namespace App\Observer;

use App\Model\User;

interface UserObserverInterface
{
    public function onUserAdded(User $user): void;
    public function onUserUpdated(User $user): void;
}