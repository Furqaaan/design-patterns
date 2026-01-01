<?php

class TreeFactory
{
    private static array $treeTypes = [];

    public static function getTreeType($type, $color, $texture): TreeType
    {
        $key = "$type-$color-$texture";

        if (!isset(self::$treeTypes[$key])) {
            self::$treeTypes[$key] = new TreeType($type, $color, $texture);
        }

        return self::$treeTypes[$key];
    }
}
