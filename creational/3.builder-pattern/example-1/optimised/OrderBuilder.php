<?php

namespace App\Builders;

use App\Models\Order;

class OrderBuilder
{
    protected Order $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function setUser(int $userId): self
    {
        $this->order->userId = $userId;
        return $this;
    }

    public function setShipping(string $address): self
    {
        $this->order->shippingAddress = $address;
        return $this;
    }

    public function setPayment(string $method): self
    {
        $this->order->paymentMethod = $method;
        return $this;
    }

    public function addItem(string $item): self
    {
        $this->order->items[] = $item;
        return $this;
    }

    public function setDiscount(float $discount): self
    {
        $this->order->discount = $discount;
        return $this;
    }

    public function setTaxes(float $taxes): self
    {
        $this->order->taxes = $taxes;
        return $this;
    }

    public function build(): Order
    {
        return $this->order;
    }
}
