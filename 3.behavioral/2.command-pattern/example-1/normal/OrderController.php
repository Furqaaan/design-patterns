<?php

class OrderController
{
    public function handle(string $action, array $order)
    {
        if ($action === 'approve') {
            echo "Order approved\n";
            echo "Stock reduced\n";
            echo "Email sent\n";
        }

        if ($action === 'cancel') {
            echo "Order cancelled\n";
            echo "Stock restored\n";
            echo "Refund initiated\n";
        }

        if ($action === 'refund') {
            echo "Refund processed\n";
        }
    }
}

$controller = new OrderController();
$controller->handle('cancel', ['id' => 101]);
