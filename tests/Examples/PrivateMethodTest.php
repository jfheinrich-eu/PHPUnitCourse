<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\PrivateMethod;
use JFHeinrich\Test\JFHeinrichTest;
use ReflectionClass;
use ReflectionException;

class PrivateMethodTest extends JFHeinrichTest
{
    /** @var PrivateMethod */
    protected $instance;

    protected function setUp(): void
    {
        $this->instance = new PrivateMethod();
    }

    protected function getTestedClassObject(): PrivateMethod
    {
        return (new PrivateMethod);
    }

    protected function getTestedClassInstance(): PrivateMethod
    {
        return $this->instance;
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getRandomToken() : void
    {
        $reflectionClass = new ReflectionClass(PrivateMethod::class);
        $method = $reflectionClass->getMethod('getRandomToken');
        $method->setAccessible(true);

        $actual = $method->invoke(new PrivateMethod());

        $this->assertIsString($actual);
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getTokenWithPrefix(): void
    {
        $reflectionClass = new ReflectionClass(PrivateMethod::class);
        $method = $reflectionClass->getMethod('getTokenWithPrefix');
        $method->setAccessible(true);

        $actual = $method->invokeArgs(new PrivateMethod(), ['example']);

        $this->assertStringStartsWith('example', $actual);
    }

    /**
     * @test
     */
    public function PropertySetToRandomInt(): void
    {
        $testedClass = new PrivateMethod();

        $reflectionClass = new ReflectionClass(PrivateMethod::class);
        $property = $reflectionClass->getProperty('member');
        $property->setAccessible(true);

        $actual = $property->getValue($testedClass);

        $this->assertIsInt($actual);
    }
}