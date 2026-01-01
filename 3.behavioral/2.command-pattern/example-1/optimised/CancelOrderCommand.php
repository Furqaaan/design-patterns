<?php

class CancelOrderCommand implements Command
{
    public function execute(): void
    {
        echo "Order cancelled\n";
        echo "Stock restored\n";
        echo "Refund initiated\n";
    }
}
