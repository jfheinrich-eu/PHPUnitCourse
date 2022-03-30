<?php declare(strict_types=1);

namespace JFHeinrich\PHPUnitCourse;

class Order
{
    /** @var int  */
    public $amount = 0;

    /** @var PaymentGateway */
    protected $gateway;

    public function __construct($gateway)
    {
        $this->gateway = $gateway;
    }

    public function process(): bool
    {
        return $this->gateway->charge($this->amount);
    }
}