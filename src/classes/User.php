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

    /**
     * @param string $message
     * @return bool
     * @throws MailerException
     */
    public function notify(string $message): bool
    {
        if(is_null($this->email))
        {
            throw new MailerException('email cannot be null');
        }
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function staticNotify(string $message): bool
    {
        return $this->mailer::send($this->email, $message);
    }
}
