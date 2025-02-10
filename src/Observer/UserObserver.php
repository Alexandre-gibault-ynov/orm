<?php

namespace App\Observer;

use App\Model\User;
use App\Service\LogService;
use App\Service\MailService;

class UserObserver implements UserObserverInterface
{
    private MailService $mailService;
    private LogService $logService;

    public function __construct() {
        $this->mailService = new MailService();
        $this->logService = new LogService();
    }

    public function onUserAdded(User $user): void {
        $subject = "Bienvenue, " . $user->getLogin();
        $message = "Bonjour " . $user->getLogin() . ",\n\nBienvenue sur notre plateforme !";
        $this->mailService->sendEmail($user->getEmail(), $subject, $message);

        $this->logService->log("Nouvel utilisateur ajouté : " . $user->getLogin());
    }

    public function onUserUpdated(User $user): void {
        $subject = "Mise à jour de votre compte";
        $message = "Bonjour " . $user->getLogin() . ",\n\nVotre compte a été mis à jour avec succès.";
        $this->mailService->sendEmail($user->getEmail(), $subject, $message);

        $this->logService->log("Utilisateur mis à jour : " . $user->getLogin());
    }
}