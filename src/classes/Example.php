<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

class Example
{
    /** @var Mailer */
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new Mailer();
    }

    public function __destruct()
    {
        $this->mailer = null;
    }

    public function AddingTwoPlusTwo(): int
    {
        return 2 + 2;
    }

    /**
     * @throws ExampleNotUnsignedException
     */
    public function AddUnsigned( int $a, int $b): int
    {
        if($a < 0 || $b < 0)
        {
            throw new ExampleNotUnsignedException("Value is not unsigned");
        }
        return $a + $b;
    }
}