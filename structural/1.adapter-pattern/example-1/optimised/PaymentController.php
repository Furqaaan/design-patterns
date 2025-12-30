<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payments\PaymentFactory;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $gateway = PaymentFactory::make($request->input('gateway'));
        $gateway->processPayment(100);
    }
}
