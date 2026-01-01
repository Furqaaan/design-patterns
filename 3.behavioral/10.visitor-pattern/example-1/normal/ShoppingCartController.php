<?php

class Book
{
    public int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }
}

class Fruit
{
    public int $pricePerKg;
    public int $weight;

    public function __construct(int $pricePerKg, int $weight)
    {
        $this->pricePerKg = $pricePerKg;
        $this->weight = $weight;
    }
}

class Electronics
{
    public int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }
}

class ShoppingCart
{
    public function calculatePrice(array $items): int
    {
        $total = 0;
        foreach ($items as $item) {
            if ($item instanceof Book) {
                $total += $item->price;
            } elseif ($item instanceof Fruit) {
                $total += $item->pricePerKg * $item->weight;
            } elseif ($item instanceof Electronics) {
                $total += $item->price;
            }
        }
        return $total;
    }
}

$items = [
    new Book(100),
    new Fruit(50, 2),
    new Electronics(500)
];

$cart = new ShoppingCart();
echo "Total: " . $cart->calculatePrice($items) . "\n";

