<?php

interface Observer
{
    public function update(string $event, mixed $data): void;
}

