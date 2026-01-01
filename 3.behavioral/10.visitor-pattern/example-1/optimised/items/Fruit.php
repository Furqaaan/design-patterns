<?php

require_once '../interfaces/Item.php';
require_once '../interfaces/ShoppingCartVisitor.php';

class Fruit implements Item
{
    public int $pricePerKg;
    public int $weight;

    public function __construct(int $pricePerKg, int $weight)
    {
        $this->pricePerKg = $pricePerKg;
        $this->weight = $weight;
    }

    public function accept(ShoppingCartVisitor $visitor): int
    {
        return $visitor->visitFruit($this);
    }
}

