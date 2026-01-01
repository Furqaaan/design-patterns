<?php

class TreeType
{
    public string $type;
    public string $color;
    public string $texture;

    public function __construct($type, $color, $texture)
    {
        $this->type = $type;
        $this->color = $color;
        $this->texture = $texture;
    }

    public function draw($x, $y)
    {
        echo "Drawing {$this->type} tree at ($x, $y)\n";
    }
}
