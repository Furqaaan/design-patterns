<?php

namespace App\Http\Interfaces;

use App\Http\Interfaces\RefundServiceInterface;
use App\Http\Interfaces\PaymentServiceInterface;
use App\Http\Interfaces\WebhookServiceInterface;

interface PaymentProviderFactoryInterface
{
    public function createPaymentService(): PaymentServiceInterface;
    public function createRefundService(): RefundServiceInterface;
    public function createWebhookService(): WebhookServiceInterface;
}