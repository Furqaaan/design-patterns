<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Services\SmsService;
use App\Services\SlackService;
use Exception;

class OrderController
{
    public function send($request)
    {
        $userId = $request->input('userId');
        $shippingAddress = $request->input('shippingAddress');
        $paymentMethod = $request->input('paymentMethod');
        $items = $request->input('items');
        $discount = $request->input('discount');
        $taxes = $request->input('taxes');

        $order = new Order(
            $userId,
            $shippingAddress,
            $paymentMethod,
            $items,
            $discount,
            $taxes
        );

        throw new Exception('Invalid channel');
    }
}
