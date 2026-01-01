<?php

class EmailSender implements InvoiceSender
{
    public function send(string $to, string $content): void
    {
        echo "📧 Sending invoice to $to via Email: $content\n";
    }
}