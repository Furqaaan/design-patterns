<?php

interface InvoiceSender
{
    public function send(string $to, string $content): void;
}
