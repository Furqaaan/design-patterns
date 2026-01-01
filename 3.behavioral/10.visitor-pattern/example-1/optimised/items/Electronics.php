<?php

require_once '../interfaces/Item.php';
require_once '../interfaces/ShoppingCartVisitor.php';

class Electronics implements Item
{
    public int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function accept(ShoppingCartVisitor $visitor): int
    {
        return $visitor->visitElectronics($this);
    }
}

