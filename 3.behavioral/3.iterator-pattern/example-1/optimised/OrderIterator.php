<?php

abstract class OrderIterator
{
    protected int $position = 0;

    abstract public function hasNext(): bool;
    abstract public function next(): array;
}
