<?php

require_once '../interfaces/PaymentStrategy.php';

class WalletPayment implements PaymentStrategy
{
    public function pay(int $amount): void
    {
        echo "Paid $amount using Wallet\n";
    }
}

