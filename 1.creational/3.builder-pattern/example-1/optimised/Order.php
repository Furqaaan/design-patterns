<?php

namespace App\Models;

class Order
{
    public $userId;
    public $shippingAddress;
    public $paymentMethod;
    public $items = [];
    public $discount = 0;
    public $taxes = 0;
}
