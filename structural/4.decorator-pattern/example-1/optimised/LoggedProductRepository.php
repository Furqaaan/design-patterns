<?php

class LoggedProductRepository implements ProductRepositoryInterface
{
    public function __construct(private ProductRepositoryInterface $repository) {}

    public function getProductById(int $id): array
    {
        echo "LOG: Getting product with ID $id\n";
        return $this->repository->getProductById($id);
    }
}
