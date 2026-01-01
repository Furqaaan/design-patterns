<?php

class Tree
{
    private int $x;
    private int $y;
    private TreeType $treeType;

    public function __construct($x, $y, TreeType $treeType)
    {
        $this->x = $x;
        $this->y = $y;
        $this->treeType = $treeType;
    }

    public function draw()
    {
        $this->treeType->draw($this->x, $this->y);
    }
}
