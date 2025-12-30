<?php

class CachedProductRepository implements ProductRepositoryInterface
{
    private array $cache = [];

    public function __construct(private ProductRepositoryInterface $repository) {}

    public function getProductById(int $id): array
    {
        if (isset($this->cache[$id])) {
            echo "Returning from CACHE\n";
            return $this->cache[$id];
        }

        $product = $this->repository->getProductById($id);
        $this->cache[$id] = $product;

        return $product;
    }
}