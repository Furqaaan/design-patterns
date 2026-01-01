<?php

require_once '../interfaces/OrderState.php';
require_once '../OrderContext.php';

class ShippedState implements OrderState
{
    public function pay(OrderContext $order): void
    {
        echo "Already paid\n";
    }

    public function ship(OrderContext $order): void
    {
        echo "Already shipped\n";
    }

    public function cancel(OrderContext $order): void
    {
        echo "Cannot cancel shipped order\n";
    }
}

