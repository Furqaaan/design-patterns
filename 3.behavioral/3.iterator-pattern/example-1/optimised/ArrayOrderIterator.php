<?php

class ArrayOrderIterator extends OrderIterator
{
    private array $orders;

    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    public function hasNext(): bool
    {
        return isset($this->orders[$this->position]);
    }

    public function next(): array
    {
        return $this->orders[$this->position++];
    }
}
