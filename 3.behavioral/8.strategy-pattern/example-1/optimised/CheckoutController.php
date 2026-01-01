<?php

require_once 'interfaces/PaymentStrategy.php';
require_once 'CheckoutService.php';
require_once 'strategies/CreditCardPayment.php';
require_once 'strategies/UpiPayment.php';
require_once 'strategies/WalletPayment.php';

$checkout = new CheckoutService();

$checkout->setPaymentStrategy(new CreditCardPayment());
$checkout->pay(2500);

$checkout->setPaymentStrategy(new UpiPayment());
$checkout->pay(1800);

$checkout->setPaymentStrategy(new WalletPayment());
$checkout->pay(1000);

