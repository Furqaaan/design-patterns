<?php

class ProductRepository
{
    private array $cache = [];

    public function getProductById(int $id): array
    {
        if (isset($this->cache[$id])) {
            echo "Returning from CACHE\n";
            return $this->cache[$id];
        }

        echo "Fetching product $id from DATABASE\n";
        // Simulate DB call
        sleep(1);
        $product = ['id' => $id, 'name' => 'Laptop', 'price' => 80000];

        $this->cache[$id] = $product;
        return $product;
    }
}

$repo = new ProductRepository();
$repo->getProductById(1);
$repo->getProductById(1);