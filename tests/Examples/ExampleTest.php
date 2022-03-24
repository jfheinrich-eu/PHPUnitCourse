<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Example;
use JFHeinrich\Test\JFHeinrichTest;

class ExampleTest extends JFHeinrichTest
{
    protected function setUp(): void
    {
        $this->tested_class = Example::class;
    }

    protected function getTestedClassObject(): Example
    {
        return (new $this->tested_class);
    }

    public function testAddingTwoPlusTwoResultsInFour(): void
    {
        $expected = 4;

        $actual = $this->getTestedClassObject()->AddingTwoPlusTwo(2,2);

        $this->assertEquals($expected, $actual);
    }
}
