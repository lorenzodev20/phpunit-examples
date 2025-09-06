<?php

declare(strict_types=1);

use PHPUnit\Event\Runtime\Runtime;

class Mailer
{
    public function sendEmail(string $recipient_email, string $subject, string $message): bool
    {
        // User SMTP or an API to send an email
        echo "(sending email ...)";

        sleep(3); //simulate process being slow

        return true;
    }
}
