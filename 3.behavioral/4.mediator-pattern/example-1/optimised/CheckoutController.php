<?php

require_once 'interfaces/CheckoutMediator.php';
require_once 'Cart.php';
require_once 'Inventory.php';
require_once 'Payment.php';
require_once 'Notification.php';
require_once 'CheckoutFlowMediator.php';

$mediator = new CheckoutFlowMediator(
    new Inventory(),
    new Payment(),
    new Notification()
);

$cart = new Cart($mediator);
$cart->checkout(2500);

