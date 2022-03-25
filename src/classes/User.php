<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

class User
{
    /** @var string */
    public $first_name;
    /** @var string */
    public $surname;
    /** @var string */
    public $email;
    /** @var Mailer */
    protected $mailer;

    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

    public function getFullName(): string
    {
        return trim("$this->first_name $this->surname");
    }

    public function notify(string $message): bool
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}
