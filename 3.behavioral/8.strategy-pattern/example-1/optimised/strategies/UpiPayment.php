<?php

require_once '../interfaces/PaymentStrategy.php';

class UpiPayment implements PaymentStrategy
{
    public function pay(int $amount): void
    {
        echo "Paid $amount using UPI\n";
    }
}

