<?php

class OrderService
{
    public function placeOrder(): void
    {
        echo "Order placed\n";
        (new EmailService())->send();
        (new AnalyticsService())->track();
        (new WarehouseService())->reserveStock();
    }
}

class EmailService
{
    public function send(): void
    {
        echo "Email sent\n";
    }
}

class AnalyticsService
{
    public function track(): void
    {
        echo "Analytics tracked\n";
    }
}

class WarehouseService
{
    public function reserveStock(): void
    {
        echo "Stock reserved\n";
    }
}

$orderService = new OrderService();
$orderService->placeOrder();

