<?php

namespace JFHeinrich\Test;

use DateTime;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;

abstract class JFHeinrichTest extends MockeryTestCase
{
    /** @var DateTime */
    protected static $start;
    /** @var DateTime */
    protected static $end;

    protected function setUp(): void
    {

    }

    protected function tearDown(): void
    {
        m::close();
    }

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$start = new DateTime();
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
        static::$end = new DateTime();
    }

    abstract protected function getTestedClassObject();
    abstract protected function getTestedClassInstance();
}