<?php

require_once 'interfaces/OrderState.php';
require_once 'OrderContext.php';
require_once 'states/PendingState.php';
require_once 'states/PaidState.php';
require_once 'states/ShippedState.php';
require_once 'states/CancelledState.php';

$order = new OrderContext();

$order->pay();    // Payment successful
$order->ship();   // Order shipped
$order->cancel(); // Cannot cancel shipped order

