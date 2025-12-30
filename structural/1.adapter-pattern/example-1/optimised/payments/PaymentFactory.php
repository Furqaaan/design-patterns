<?php

namespace App\Payments;

use App\Payments\PaymentGateway;
use App\Payments\StripeAdapter;
use App\Payments\PayPalAdapter;
use Vendor\Stripe\StripePayment;
use Vendor\PayPal\PayPalPayment;

class PaymentFactory
{
    public static function make(string $gateway): PaymentGateway
    {
        return match ($gateway) {
            'stripe' => new StripeAdapter(new StripePayment()),
            'paypal' => new PayPalAdapter(new PayPalPayment()),
            default  => throw new \Exception("Unsupported gateway"),
        };
    }
}
