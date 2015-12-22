<?php

namespace common\onecms;

class TreeHelper {
    public static function build($data)
    {
        $tree = [];
        $dash = '|---';
        foreach ($data as $node) {
            $tree[$node->id] = str_pad($node->title, strlen($node->title)
                +strlen($dash)*$node->depth, $dash, STR_PAD_LEFT);
        }

        return $tree;
    }
}