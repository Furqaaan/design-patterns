<?php

namespace App\Payments;

interface PaymentGateway
{
    public function processPayment(float $amount): void;
}
