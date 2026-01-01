<?php

require_once 'interfaces/CheckoutMediator.php';

class Cart
{
    private CheckoutMediator $mediator;

    public function __construct(CheckoutMediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function checkout(int $amount): void
    {
        echo "Cart checkout started\n";
        $this->mediator->notify('checkout_started', $amount);
    }
}

