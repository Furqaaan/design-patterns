<?php

namespace App\Payments\Factory;

use App\Http\Interfaces\PaymentProviderFactoryInterface;
use App\Http\Interfaces\PaymentServiceInterface;
use App\Http\Interfaces\RefundServiceInterface;
use App\Http\Interfaces\WebhookServiceInterface;
use App\Payments\Stripe\StripePayment;
use App\Payments\Stripe\StripeRefund;
use App\Payments\Stripe\StripeWebhook;

class StripeFactory implements PaymentProviderFactoryInterface
{
    public function createPaymentService(): PaymentServiceInterface { return new StripePayment(); }
    public function createRefundService(): RefundServiceInterface { return new StripeRefund(); }
    public function createWebhookService(): WebhookServiceInterface { return new StripeWebhook(); }
}