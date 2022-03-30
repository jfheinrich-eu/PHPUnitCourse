<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

abstract class Person
{
    /** @var string */
    protected $surname;

    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    abstract protected function getTitle(): string;

    public function getNameAndTitle(): string
    {
        return $this->getTitle() . ' ' . $this->surname;
    }
}