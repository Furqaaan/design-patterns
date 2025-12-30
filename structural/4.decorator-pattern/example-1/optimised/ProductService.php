<?php

class ProductService
{
    public function getProducts(): array
    {
        $repository = new CachedProductRepository(
            new LoggedProductRepository(
                new ProductRepository()
            )
       );

        return $repository->getProductById(1);
    }
}

