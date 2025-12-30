<?php

use ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProductById(int $id): array
    {
        echo "Fetching product $id from DATABASE\n";
        sleep(1); // simulate heavy query
        return ['id' => $id, 'name' => 'Laptop', 'price' => 80000];
    }
}