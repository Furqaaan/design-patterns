<?php

// Solution: Using Iterator Pattern
// Processing code does NOT depend on how orders are fetched
// Iterator is passed to repository - no change needed in repository!

// Using ArrayOrderIterator
$orders = [
    ['id' => 101, 'amount' => 2500],
    ['id' => 102, 'amount' => 1800],
    ['id' => 103, 'amount' => 3200],
];
$iterator = new ArrayOrderIterator($orders);
$repo = new OrderRepository($iterator);

// To switch to DB source, just change the iterator:
// $iterator = new DbOrderIterator();
// $repo = new OrderRepository($iterator);

$iterator = $repo->getOrders();

while ($iterator->hasNext()) {
    $order = $iterator->next();
    echo "Processing Order #{$order['id']}\n";
}

// ✅ Clean
// ✅ Data-source-agnostic
// ✅ No change to repository when switching data sources!
