<?php

abstract class Invoice
{
    protected InvoiceSender $sender;

    public function __construct(InvoiceSender $sender)
    {
        $this->sender = $sender;
    }

    abstract public function generateAndSend(string $to): void;
}
