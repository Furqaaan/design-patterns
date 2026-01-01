<?php

class OrderFacade {
    protected OrderValidator $validator;
    protected PaymentGateway $payment;
    protected InvoiceGenerator $invoice;
    protected EmailService $email;

    public function __construct()
    {
        $this->validator = new OrderValidator();
        $this->payment = new PaymentGateway();
        $this->invoice = new InvoiceGenerator();
        $this->email = new EmailService();
    }

    public function placeOrder(array $order)
    {
        $this->validator->validate($order);
        $this->payment->charge($order['amount']);
        $this->invoice->generate($order);
        $this->email->sendConfirmation($order);

        echo "✅ Order #{$order['id']} completed successfully.\n";
    }
}