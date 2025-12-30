<?php

class OnlineOrderInvoice extends Invoice
{
    public function generateAndSend(string $to): void
    {
        $content = "Online Order Invoice #123 for $to";
        $this->sender->send($to, $content);
    }
}