<?php

require_once '../interfaces/PaymentStrategy.php';

class CreditCardPayment implements PaymentStrategy
{
    public function pay(int $amount): void
    {
        echo "Paid $amount using Credit Card\n";
    }
}

