<?php

require_once '../interfaces/OrderState.php';
require_once '../OrderContext.php';
require_once 'PaidState.php';
require_once 'CancelledState.php';

class PendingState implements OrderState
{
    public function pay(OrderContext $order): void
    {
        echo "Payment successful\n";
        $order->setState(new PaidState());
    }

    public function ship(OrderContext $order): void
    {
        echo "Cannot ship unpaid order\n";
    }

    public function cancel(OrderContext $order): void
    {
        echo "Order cancelled\n";
        $order->setState(new CancelledState());
    }
}

