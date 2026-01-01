<?php

require_once 'interfaces/Subject.php';
require_once 'interfaces/Observer.php';

class OrderService implements Subject
{
    private array $observers = [];

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        $this->observers = array_filter(
            $this->observers,
            fn($o) => $o !== $observer
        );
    }

    public function notify(string $event, mixed $data): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($event, $data);
        }
    }

    public function placeOrder(int $orderId): void
    {
        echo "Order $orderId placed\n";
        $this->notify('order_placed', $orderId);
    }
}

