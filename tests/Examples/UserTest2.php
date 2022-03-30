<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Mailer;
use JFHeinrich\PHPUnitCourse\MailerException;
use JFHeinrich\PHPUnitCourse\User;
use JFHeinrich\Test\JFHeinrichTest;
use Mockery as m;

class UserTest2 extends JFHeinrichTest
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

    protected function tearDown(): void
    {
        m::close();
    }

    /**
     * @test
     */
    public function mailerSendReturnsTrue(): void
    {
        $user = $this->getTestedClassObject();
        $user->email = 'dave@example.com';

        $mockMailer = m::mock('alias:' . Mailer::class);
        $mockMailer->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello')
            ->andReturnTrue();

        $user->setMailer($mockMailer);
        $actual = $user->staticNotify('Hello');

        $this->assertTrue($actual);
    }
}