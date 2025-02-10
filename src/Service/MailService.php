<?php

declare(strict_types=1);

namespace App\Service;

class MailService
{
    public function sendEmail(string $to, string $subject, string $message): void {
        // Mail sending Simulation
        echo "📧 Email sent to $to\n";
        echo "Subject: $subject\n";
        echo "Message:\n$message\n\n";
    }
}