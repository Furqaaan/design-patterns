<?php

interface ShoppingCartVisitor
{
    public function visitBook(Book $book): int;
    public function visitFruit(Fruit $fruit): int;
    public function visitElectronics(Electronics $electronics): int;
}

