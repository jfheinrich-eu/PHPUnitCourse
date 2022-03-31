<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

class myClassUse
{
    public function get(): MyClass
    {
        return MyClass::getInstance();
    }

}