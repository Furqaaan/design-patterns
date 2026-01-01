<?php

class DbOrderIterator extends OrderIterator
{
    private array $rows;

    public function __construct()
    {
        // Simulate getting DB rows
        $this->rows = [
            ['id' => 201, 'amount' => 4000],
            ['id' => 202, 'amount' => 1500],
        ];
    }

    public function hasNext(): bool
    {
        return isset($this->rows[$this->position]);
    }

    public function next(): array
    {
        return $this->rows[$this->position++];
    }
}
