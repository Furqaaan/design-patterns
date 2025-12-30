<?php

namespace App\Payments\Paypal;

use App\Http\Interfaces\WebhookServiceInterface;

class PaypalWebhook implements WebhookServiceInterface
{
    public function handle($amount)
    {
        return "Paypal: Webhook handled {$amount}";
    }
}