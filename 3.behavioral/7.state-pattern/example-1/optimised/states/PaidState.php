<?php

require_once '../interfaces/OrderState.php';
require_once '../OrderContext.php';
require_once 'ShippedState.php';

class PaidState implements OrderState
{
    public function pay(OrderContext $order): void
    {
        echo "Already paid\n";
    }

    public function ship(OrderContext $order): void
    {
        echo "Order shipped\n";
        $order->setState(new ShippedState());
    }

    public function cancel(OrderContext $order): void
    {
        echo "Cannot cancel after payment\n";
    }
}

