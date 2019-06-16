<?php

namespace App;

class Node
{
    /**
     * @var
     */
    public $value;

    /**
     * @var
     */
    public $parent;

    /**
     * Node constructor.
     *
     * @param $value
     * @param null $parent
     */
    public function __construct($value, $parent = NULL)
    {
        $this->value = $value;
        $this->parent = $parent;
    }

//    /**
//     * Returns the ancestors.
//     *
//     * @return array
//     */
//    public function getAncestors()
//    {
//        $node = $this;
//        $ancestors = [];
//        while ($node->parent != null) {
//            array_unshift($ancestors, $node->value);
//            $node = $node->parent;
//        }
//        array_unshift($ancestors, $node->value);
//        return $ancestors;
//    }

    /**
     * Returns the depth of the node
     *
     * @return int
     */
    public function getDepth()
    {
        $depth = 1;
        $node = $this;
        while ($node->parent) {
            $node = $node->parent;
            $depth++;
        }
        return $depth;
    }
}
