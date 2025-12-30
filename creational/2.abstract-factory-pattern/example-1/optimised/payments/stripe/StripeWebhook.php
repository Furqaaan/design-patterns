<?php

namespace App\Payments\Stripe;

use App\Http\Interfaces\WebhookServiceInterface;

class StripeWebhook implements WebhookServiceInterface
{
    public function handle($amount)
    {
        return "Stripe: Webhook handled {$amount}";
    }
}