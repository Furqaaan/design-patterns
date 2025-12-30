<?php

namespace Vendor\Stripe;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Vendor\Stripe\StripePayment;
use Vendor\PayPal\PayPalPayment;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $amount = 100;

        if ($request->gateway === 'stripe') {
            $stripe = new StripePayment();
            $stripe->pay($amount, 'USD'); // External/library package api
        } elseif ($request->gateway === 'paypal') {
            $paypal = new PayPalPayment();
            $paypal->sendPayment($amount, 'USD'); // External/library package api
        }
    }
}
