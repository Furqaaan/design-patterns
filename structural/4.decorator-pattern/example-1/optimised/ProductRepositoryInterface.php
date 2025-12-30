<?php

interface ProductRepositoryInterface
{
    public function getProductById(int $id): array;
}