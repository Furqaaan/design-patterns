<?php

require_once '../interfaces/Observer.php';

class EmailObserver implements Observer
{
    public function update(string $event, mixed $data): void
    {
        if ($event === 'order_placed') {
            echo "Email sent for order $data\n";
        }
    }
}

