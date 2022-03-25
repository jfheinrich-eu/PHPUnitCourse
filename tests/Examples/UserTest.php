<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Mailer;
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
     */
    public function NotificationIsSent(): void
    {
        $user = $this->getTestedClassObject();

        $user->email = 'heini@holtenbeen.de';

        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')
            ->willReturn(true);

        $user->setMailer($mock);
        $this->assertTrue($user->notify("Hello"));
    }

}