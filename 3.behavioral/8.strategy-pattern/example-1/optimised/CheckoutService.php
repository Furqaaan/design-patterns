<?php

require_once 'interfaces/PaymentStrategy.php';

class CheckoutService
{
    private PaymentStrategy $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $strategy): void
    {
        $this->paymentStrategy = $strategy;
    }

    public function pay(int $amount): void
    {
        $this->paymentStrategy->pay($amount);
    }
}

