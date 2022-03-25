<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

class Mailer
{
    public function sendMessage(string $email, string $message): bool
    {
        sleep(3);

        echo "send '$message' to '$email'\n";

        return true;
    }
}