<?php

namespace App\Http\Controllers;

use App\Builders\OrderBuilder;

class OrderController
{
    public function send()
    {
        $order = (new OrderBuilder())
            ->setUser(101)
            ->setShipping("221B Baker Street, London")
            ->setPayment("stripe")
            ->addItem("iPhone 15")
            ->addItem("MacBook Pro")
            ->setDiscount(1000)
            ->setTaxes(500)
            ->build();
    }
}