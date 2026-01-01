<?php

require_once '../interfaces/Observer.php';

class WarehouseObserver implements Observer
{
    public function update(string $event, mixed $data): void
    {
        if ($event === 'order_placed') {
            echo "Stock reserved for order $data\n";
        }
    }
}

