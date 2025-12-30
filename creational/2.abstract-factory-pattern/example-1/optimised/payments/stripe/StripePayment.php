<?php

namespace App\Payments\Stripe;

use App\Http\Interfaces\PaymentServiceInterface;

class StripePayment implements PaymentServiceInterface
{
    public function pay($amount)
    {
        return "Stripe: Paid {$amount}";
    }
}