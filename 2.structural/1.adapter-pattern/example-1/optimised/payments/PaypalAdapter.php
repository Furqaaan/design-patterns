<?php

namespace App\Payments;

use Vendor\PayPal\PayPalPayment;
use App\Payments\PaymentGateway;

class PayPalAdapter implements PaymentGateway
{
    private PayPalPayment $paypal;

    public function __construct(PayPalPayment $paypal)
    {
        $this->paypal = $paypal;
    }

    public function processPayment(float $amount): void
    {
        $this->paypal->sendPayment($amount, 'USD');
    }
}
