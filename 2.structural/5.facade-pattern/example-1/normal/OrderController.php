<?php

class OrderValidator {
    public function validate($order) {
        echo "Validating order...\n";
    }
}

class PaymentGateway {
    public function charge($amount) {
        echo "Charging $$amount via payment gateway...\n";
    }
}

class InvoiceGenerator {
    public function generate($order) {
        echo "Generating invoice for order #{$order['id']}\n";
    }
}

class EmailService {
    public function sendConfirmation($order) {
        echo "Sending confirmation email for order #{$order['id']}\n";
    }
}

$order = ['id' => 101, 'amount' => 2500];

$validator = new OrderValidator();
$payment = new PaymentGateway();
$invoice = new InvoiceGenerator();
$email = new EmailService();

$validator->validate($order);
$payment->charge($order['amount']);
$invoice->generate($order);
$email->sendConfirmation($order);