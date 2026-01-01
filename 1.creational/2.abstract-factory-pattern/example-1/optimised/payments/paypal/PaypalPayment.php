<?php

namespace App\Payments\Paypal;

use App\Http\Interfaces\PaymentServiceInterface;

class PaypalPayment implements PaymentServiceInterface
{
    public function pay($amount)
    {
        return "Paypal: Paid {$amount}";
    }
}