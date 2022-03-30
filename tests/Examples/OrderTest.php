<?php declare(strict_types=1);

namespace JFHeinrich\Test\Examples;

use JFHeinrich\PHPUnitCourse\Order;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class OrderTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

    /**
     * @test
     */
    public function OrderIsProcessedUsingMockery(): void
    {
        $gateway = m::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
            ->times(2)
            ->with( 200)
            ->andReturnTrue();

        $order = new Order($gateway);
        $order->amount = 200;
        $order->process();

        $this->assertTrue($order->process());
    }
}