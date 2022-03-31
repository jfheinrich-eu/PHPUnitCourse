<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\myClassUse;

class myClassUseTest extends \JFHeinrich\Test\JFHeinrichTest
{
    /** @var myClassUse */
    protected $instance;

    protected function setUp(): void
    {
        $this->instance = new myClassUse();
    }

    protected function getTestedClassObject(): myClassUse
    {
        return (new myClassUse);
    }

    protected function getTestedClassInstance(): myClassUse
    {
        return $this->instance;
    }

    /**
     * @test
     */
    public function get(): void
    {
        $testedClass = $this->getTestedClassObject();

        $a = $testedClass->get();
        sleep(1);
        $b = $testedClass->get();

        $this->assertEquals($a::$timestamp, $b::$timestamp);
    }
}