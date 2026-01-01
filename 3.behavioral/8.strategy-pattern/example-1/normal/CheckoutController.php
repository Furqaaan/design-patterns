<?php

class CheckoutService
{
    public function pay(string $method, int $amount): void
    {
        if ($method === 'card') {
            echo "Paid $amount using Credit Card\n";
        } elseif ($method === 'upi') {
            echo "Paid $amount using UPI\n";
        } elseif ($method === 'wallet') {
            echo "Paid $amount using Wallet\n";
        } else {
            echo "Invalid payment method\n";
        }
    }
}

$checkout = new CheckoutService();
$checkout->pay('card', 2500);
$checkout->pay('upi', 1800);

