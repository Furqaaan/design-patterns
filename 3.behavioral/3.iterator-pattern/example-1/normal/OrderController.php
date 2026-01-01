<?php

// Problem: Processing orders directly from array
// If source changes (DB, API, file), this code breaks!

$orders = [
    ['id' => 101, 'amount' => 2500],
    ['id' => 102, 'amount' => 1800],
    ['id' => 103, 'amount' => 3200],
];

$i = 0;
while ($i < count($orders)) {
    echo "Processing Order #{$orders[$i]['id']}\n";
    $i++;
}

// 🚨 Fragile! What if source changes?
// If tomorrow orders come from a DB cursor, API pagination, or file stream,
// you must rewrite the loop everywhere.
