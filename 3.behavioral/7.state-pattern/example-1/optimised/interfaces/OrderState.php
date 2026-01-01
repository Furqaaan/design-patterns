<?php

interface OrderState
{
    public function pay(OrderContext $order): void;
    public function ship(OrderContext $order): void;
    public function cancel(OrderContext $order): void;
}

