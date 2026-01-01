<?php

namespace App\Payments;

use InvalidArgumentException;
use App\Http\Interfaces\PaymentProviderFactoryInterface;
use App\Payments\Factory\StripeFactory;
use App\Payments\Factory\PaypalFactory;

class PaymentFactory
{
    public static function make(string $provider): PaymentProviderFactoryInterface
    {
        return match ($provider) {
            'stripe'   => new StripeFactory(),
            'paypal'   => new PayPalFactory(),
            default    => throw new InvalidArgumentException("Unsupported provider: {$provider}"),
        };
    }
}