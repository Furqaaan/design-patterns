<?php

class SubscriptionInvoice extends Invoice
{
    public function generateAndSend(string $to): void
    {
        $content = "Monthly Subscription Invoice for $to";
        $this->sender->send($to, $content);
    }
}