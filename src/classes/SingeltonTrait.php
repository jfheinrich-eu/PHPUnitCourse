<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

use DateTime;

trait SingeltonTrait
{
    private static $instance;
    /** @var int */
    public static $timestamp;

    protected function __construct() { }

    public static function getInstance(): self
    {
        if(!self::$instance)
        {
            // new self() will refer to the class that uses the trait
            self::$instance = new self();
            self::$timestamp = (new DateTime())
                ->getTimestamp();
        }
        return self::$instance;
    }

    protected function __clone() {}
    protected function __wakeup() {}
}