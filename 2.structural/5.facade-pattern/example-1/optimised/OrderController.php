<?php

$order = ['id' => 101, 'amount' => 2500];

$facade = new OrderFacade();
$facade->placeOrder($order);