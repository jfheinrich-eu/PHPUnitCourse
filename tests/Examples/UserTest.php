<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Mailer;
use JFHeinrich\PHPUnitCourse\MailerException;
use JFHeinrich\PHPUnitCourse\User;
use JFHeinrich\Test\JFHeinrichTest;

class UserTest extends JFHeinrichTest
{
    /** @var User */
    protected $instance;

    protected function setUp(): void
    {
        $this->instance = new User();
    }

    protected function getTestedClassInstance(): User
    {
        return $this->instance;
    }

    protected function getTestedClassObject(): User
    {
        return (new User);
    }

    /**
     * @test
     */
    public function ReturnsFullName(): void
    {
        $user = $this->getTestedClassObject();

        $user->first_name = "Heini";
        $user->surname = "Holtenbeen";

        $this->assertEquals("Heini Holtenbeen", $user->getFullName());
    }


    /**
     * @test
     */
    public function FullNameIsEmptyByDefault(): void
    {
        $user = $this->getTestedClassObject();

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     * @throws MailerException
     */
    public function NotificationIsSent(): void
    {
        $user = $this->getTestedClassObject();

        $user->email = 'heini@holtenbeen.de';

        $mock = $this->createMock(Mailer::class);
        $mock->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('heini@holtenbeen.de'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mock);
        $this->assertTrue($user->notify("Hello"));
    }

    /**
     * @test
     * @throws MailerException
     */
    public function CallNotifyWithNullAsEmailAddress(): void
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $user->setMailer($mock_mailer);

        $this->ExpectException(MailerException::class);

        $user->notify("Hello");
    }

    /**
     * @test
     * @return void
     * @throws MailerException
     */
    public function CallNotifyWithEmptyEmailAddress(): void
    {
        $user = new User;
        $user->email = '';

        $mock_mailer = $this->getMockBuilder(Mailer::class)
            ->onlyMethods([]) // No methods are mocked! The original code is executed!
            ->getMock();

        $user->setMailer($mock_mailer);

        $this->ExpectException(MailerException::class);

        $user->notify("Hello");
    }
}