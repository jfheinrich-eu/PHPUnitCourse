<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

use DateTime;
use Exception;

class PrivateMethod
{
    /** @var int */
    protected $member;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->member = random_int(0, 100);
    }

    private function getRandomToken(): string
    {
        return sha1((new DateTime())->format('YmdHisu'));
    }

    private function getTokenWithPrefix(string $prefix): string
    {
        $token = $prefix;
        $token .= sha1((new DateTime())->format('YmdHisu'));

        return $token;
    }
}