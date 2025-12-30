<?php

class WhatsAppSender implements InvoiceSender
{
    public function send(string $to, string $content): void
    {
        echo "💬 Sending invoice to $to via WhatsApp: $content\n";
    }
}
