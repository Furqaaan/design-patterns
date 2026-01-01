<?php

require_once '../interfaces/ShoppingCartVisitor.php';
require_once '../items/Book.php';
require_once '../items/Fruit.php';
require_once '../items/Electronics.php';

class PriceCalculator implements ShoppingCartVisitor
{
    public function visitBook(Book $book): int
    {
        return $book->price;
    }

    public function visitFruit(Fruit $fruit): int
    {
        return $fruit->pricePerKg * $fruit->weight;
    }

    public function visitElectronics(Electronics $electronics): int
    {
        return $electronics->price;
    }
}

