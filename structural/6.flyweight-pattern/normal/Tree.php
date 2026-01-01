<?php

class Tree
{
    public string $type;
    public string $color;
    public string $texture;
    public int $x;
    public int $y;

    public function __construct($type, $color, $texture, $x, $y)
    {
        $this->type = $type;
        $this->color = $color;
        $this->texture = $texture;
        $this->x = $x;
        $this->y = $y;
    }

    public function draw()
    {
        echo "Drawing {$this->type} tree at ({$this->x}, {$this->y})\n";
    }
}
