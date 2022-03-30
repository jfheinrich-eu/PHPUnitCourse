<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

class Mailer
{
    /**
     * @param string $email
     * @param string $message
     * @return bool
     * @throws MailerException
     */
    public function sendMessage(string $email, string $message): bool
    {
            if(empty($email))
            {
                throw new MailerException('eMail cannot be empty');
            }
            sleep(3);

            echo "send '$message' to '$email'\n";

            return true;
    }

    public static function send(string $email, string $message): bool
    {
        echo "send '$message' to '$email' from static\n";
        return true;
    }
}