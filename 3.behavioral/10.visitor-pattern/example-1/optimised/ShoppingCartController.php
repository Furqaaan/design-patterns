<?php

require_once 'interfaces/Item.php';
require_once 'interfaces/ShoppingCartVisitor.php';
require_once 'items/Book.php';
require_once 'items/Fruit.php';
require_once 'items/Electronics.php';
require_once 'visitors/PriceCalculator.php';

$items = [
    new Book(100),
    new Fruit(50, 2),
    new Electronics(500)
];

$calculator = new PriceCalculator();
$total = 0;

foreach ($items as $item) {
    $total += $item->accept($calculator);
}

echo "Total: $total\n";

