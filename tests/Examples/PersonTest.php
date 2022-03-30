<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    /**
     * @test
     */
    public function getNameAndTitle(): void
    {
        $mock = $this->getMockBuilder(Person::class)
            ->setConstructorArgs(['Green'])
            ->getMockForAbstractClass();

        $mock->method('getTitle')
            ->willReturn('Dr.');

        $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
    }
}