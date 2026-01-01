<?php

interface CheckoutMediator
{
    public function notify(string $event, mixed $data = null): void;
}

