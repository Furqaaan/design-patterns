<?php

namespace App\Payments\Stripe;

use App\Http\Interfaces\RefundServiceInterface;

class StripeRefund implements RefundServiceInterface
{
    public function refund($amount)
    {
        return "Stripe: Refunded {$amount}";
    }
}