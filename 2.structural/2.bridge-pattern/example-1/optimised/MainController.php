<?php


class PaymentController
{
    public function send()
    {
        $emailSender = new EmailSender();
        $whatsAppSender = new WhatsAppSender();

        $invoice1 = new OnlineOrderInvoice($emailSender);
        $invoice2 = new SubscriptionInvoice($whatsAppSender);

        $invoice1->generateAndSend("furkan@example.com");
        $invoice2->generateAndSend("+919999999999");
    }
}
