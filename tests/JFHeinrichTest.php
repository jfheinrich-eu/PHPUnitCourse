<?php

namespace JFHeinrich\Test;

use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use StdClass;

abstract class JFHeinrichTest extends MockeryTestCase
{
    /** @var StdClass */
    protected $tested_class;

    protected function setUp(): void
    {

    }

    protected function tearDown(): void
    {
        m::close();
    }

    abstract protected function getTestedClassObject();
}