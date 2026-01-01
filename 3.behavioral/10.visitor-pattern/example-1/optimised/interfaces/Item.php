<?php

require_once 'ShoppingCartVisitor.php';

interface Item
{
    public function accept(ShoppingCartVisitor $visitor): int;
}

