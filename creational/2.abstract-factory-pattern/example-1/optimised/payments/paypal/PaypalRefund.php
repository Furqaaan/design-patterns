<?php

namespace App\Payments\Paypal;

use App\Http\Interfaces\RefundServiceInterface;

class PaypalRefund implements RefundServiceInterface
{
    public function refund($amount)
    {
        return "Paypal: Refunded {$amount}";
    }
}