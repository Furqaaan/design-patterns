<?php

namespace App\Payments;

use Vendor\Stripe\StripePayment;
use App\Payments\PaymentGateway;

class StripeAdapter implements PaymentGateway
{
    private StripePayment $stripe;

    public function __construct(StripePayment $stripe)
    {
        $this->stripe = $stripe;
    }

    public function processPayment(float $amount): void
    {
        $this->stripe->pay($amount, 'USD');
    }
}
