<?php

$trees = [];

$oakType = TreeFactory::getTreeType("Oak", "Green", "Rough");

$trees[] = new Tree(10, 20, $oakType);
$trees[] = new Tree(15, 25, $oakType);
$trees[] = new Tree(30, 40, $oakType);

foreach ($trees as $tree) {
    $tree->draw();
}
