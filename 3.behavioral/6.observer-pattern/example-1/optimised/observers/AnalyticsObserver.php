<?php

require_once '../interfaces/Observer.php';

class AnalyticsObserver implements Observer
{
    public function update(string $event, mixed $data): void
    {
        if ($event === 'order_placed') {
            echo "Analytics tracked for order $data\n";
        }
    }
}

