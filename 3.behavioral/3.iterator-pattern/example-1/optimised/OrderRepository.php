<?php

class OrderRepository
{
    private OrderIterator $iterator;

    public function __construct(OrderIterator $iterator)
    {
        $this->iterator = $iterator;
    }

    public function getOrders(): OrderIterator
    {
        return $this->iterator;
    }
}
