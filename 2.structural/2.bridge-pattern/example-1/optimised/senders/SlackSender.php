<?php

class SlackSender implements InvoiceSender
{
    public function send(string $to, string $content): void
    {
        echo "💻 Sending invoice to $to via Slack: $content\n";
    }
}
