<?php

namespace App\Payments\Factory;

use App\Http\Interfaces\PaymentProviderFactoryInterface;
use App\Http\Interfaces\PaymentServiceInterface;
use App\Http\Interfaces\RefundServiceInterface;
use App\Http\Interfaces\WebhookServiceInterface;
use App\Payments\Paypal\PaypalPayment;
use App\Payments\Paypal\PaypalRefund;
use App\Payments\Paypal\PaypalWebhook;

class PaypalFactory implements PaymentProviderFactoryInterface
{
    public function createPaymentService(): PaymentServiceInterface { return new PaypalPayment(); }
    public function createRefundService(): RefundServiceInterface { return new PaypalRefund(); }
    public function createWebhookService(): WebhookServiceInterface { return new PaypalWebhook(); }
}