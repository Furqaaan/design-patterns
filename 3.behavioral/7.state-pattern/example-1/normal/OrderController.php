<?php

class Order
{
    private string $state = 'pending';

    public function pay(): void
    {
        if ($this->state === 'pending') {
            echo "Payment successful\n";
            $this->state = 'paid';
        } else {
            echo "Payment not allowed\n";
        }
    }

    public function ship(): void
    {
        if ($this->state === 'paid') {
            echo "Order shipped\n";
            $this->state = 'shipped';
        } else {
            echo "Shipping not allowed\n";
        }
    }

    public function cancel(): void
    {
        if ($this->state === 'pending') {
            echo "Order cancelled\n";
            $this->state = 'cancelled';
        } else {
            echo "Cancel not allowed\n";
        }
    }
}

$order = new Order();
$order->pay();    // Payment successful
$order->ship();   // Order shipped
$order->cancel(); // Cancel not allowed

