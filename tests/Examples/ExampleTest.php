<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Example;
use JFHeinrich\PHPUnitCourse\ExampleNotUnsignedException;
use JFHeinrich\PHPUnitCourse\Mailer;
use JFHeinrich\Test\JFHeinrichTest;

class ExampleTest extends JFHeinrichTest
{
    /** @var Example  */
    protected $instance;

    protected function setUp(): void
    {
        $this->instance = new Example();
    }

    protected function getTestedClassObject(): Example
    {
        return (new Example);
    }

    protected function getTestedClassInstance(): Example
    {
        return $this->instance;
    }

    public function testAddingTwoPlusTwoResultsInFour(): void
    {
        $expected = 4;

        $actual = $this->getTestedClassObject()->AddingTwoPlusTwo();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @dataProvider AddDataProvider
     * @throws ExampleNotUnsignedException
     */
    public function AddUnsignedReturnsCorrectValue(int $a, int $b, int $expected): void
    {
        $actual = $this->getTestedClassInstance()->AddUnsigned($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @dataProvider AddIncorrectDataProvider
     * @throws ExampleNotUnsignedException
     */
    public function AddUnsignedReturnsIncorrectValue(int $a, int $b, int $expected): void
    {
        $actual = $this->getTestedClassInstance()->AddUnsigned($a, $b);

        $this->assertNotEquals($expected, $actual);
    }

    /**
     * @test
     * @dataProvider AddExceptionDataProvider
     * @throws ExampleNotUnsignedException
     */
    public function AddUnsignedThrowsExampleNotUnsignedException(int $a, int $b): void
    {
        $this->expectException(ExampleNotUnsignedException::class);
        $this->getTestedClassInstance()->AddUnsigned($a, $b);
    }

    /**
     * @test
     */
    public function mockMailer(): void
    {
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')->willReturn(true);


        $actual = $mock->sendMessage('hans@mustermann.de', 'Empty test message');
        $this->assertTrue($actual);
    }

    // Provider

    public function AddDataProvider(): array
    {
        return [
          [0,0,0],
          [2,2,4]
        ];
    }

    public function AddIncorrectDataProvider(): array
    {
        return [
          [0,0,100],
          [5,6,12]
        ];
    }

    public function AddExceptionDataProvider(): array
    {
        return [
          [-1,2],
          [2,-1],
          [-1,-1]
        ];
    }
}
