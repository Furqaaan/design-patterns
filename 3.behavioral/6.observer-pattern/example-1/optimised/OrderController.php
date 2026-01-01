<?php

require_once 'interfaces/Subject.php';
require_once 'interfaces/Observer.php';
require_once 'OrderService.php';
require_once 'observers/EmailObserver.php';
require_once 'observers/AnalyticsObserver.php';
require_once 'observers/WarehouseObserver.php';

$orderService = new OrderService();
$orderService->attach(new EmailObserver());
$orderService->attach(new AnalyticsObserver());
$orderService->attach(new WarehouseObserver());

$orderService->placeOrder(101);

