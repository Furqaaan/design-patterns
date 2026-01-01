<?php

require_once 'interfaces/CheckoutMediator.php';
require_once 'Inventory.php';
require_once 'Payment.php';
require_once 'Notification.php';

class CheckoutFlowMediator implements CheckoutMediator
{
    private Inventory $inventory;
    private Payment $payment;
    private Notification $notification;

    public function __construct(
        Inventory $inventory,
        Payment $payment,
        Notification $notification
    ) {
        $this->inventory = $inventory;
        $this->payment = $payment;
        $this->notification = $notification;
    }

    public function notify(string $event, mixed $data = null): void
    {
        if ($event === 'checkout_started') {
            $this->inventory->reserve();
            $this->payment->pay($data);
            $this->notification->send();
        }
    }
}

