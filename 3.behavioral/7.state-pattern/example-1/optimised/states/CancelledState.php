<?php

require_once '../interfaces/OrderState.php';
require_once '../OrderContext.php';

class CancelledState implements OrderState
{
    public function pay(OrderContext $order): void
    {
        echo "Order cancelled\n";
    }

    public function ship(OrderContext $order): void
    {
        echo "Order cancelled\n";
    }

    public function cancel(OrderContext $order): void
    {
        echo "Already cancelled\n";
    }
}

