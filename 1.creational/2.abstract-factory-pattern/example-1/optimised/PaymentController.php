<?php

namespace App\Http\Controllers;

use App\Payments\PaymentFactory;

class NotificationController
{
    public function send($request)
    {
        $provider = $request->input('provider', 'stripe');
        $amount = $request->input('amount');

        $factory = PaymentFactory::make($provider);

        $payment = $factory->createPaymentService();
        $refund = $factory->createRefundService();
        $webhook = $factory->createWebhookService();

        $payment->pay($amount);
        $refund->refund($amount);
        $webhook->handle($amount);
    }
}