<?php

namespace App\Http\Controllers;

use Exception;

class PaymentController
{
    public function process($request)
    {
        $provider = $request->input('provider');
        $amount = $request->input('amount');

        if ($provider === 'stripe') {
            $payment = new StripePayment();
            $refund = new StripeRefund();
            $webhook = new StripeWebhook();
        } else {
            $payment = new PayPalPayment();
            $refund = new PayPalRefund();
            $webhook = new PayPalWebhook();
        }

        $payment->pay($amount);
        $refund->refund($amount);
        $webhook->handle($amount);

        throw new Exception('Invalid provider');
    }
}
