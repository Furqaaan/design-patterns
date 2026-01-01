<?php

class Cart
{
    public function checkout($amount)
    {
        $inventory = new Inventory();
        $inventory->reserve();

        $payment = new Payment();
        $payment->pay($amount);

        $notification = new Notification();
        $notification->send();
    }
}

class Inventory
{
    public function reserve()
    {
        echo "Inventory reserved\n";
    }
}

class Payment
{
    public function pay($amount)
    {
        echo "Payment of $amount done\n";
    }
}

class Notification
{
    public function send()
    {
        echo "Confirmation email sent\n";
    }
}

$cart = new Cart();
$cart->checkout(2500);

