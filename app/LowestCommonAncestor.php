<?php

namespace App;

class LowestCommonAncestor
{
    /**
     * Prints the lowest common ancestor
     *
     * O(h) time and O(1) Extra Space needed for this solution
     * where h is height of Binary Tree
     *
     * @param $node1
     * @param $node2
     * @return null
     */
    public function lca($node1, $node2)
    {
//    $a1 = $node1->getAncestors();
//    $a2 = $node2->getAncestors();
//    $count = 0;
//    while (true) {
//        if (!isset($a1[$count]) || !isset($a2[$count]) || $a1[$count] != $a2[$count]) {
//            return $a1[$count - 1];
//        }
//        $count++;
//    }
//    return null;
        if ($node1->value == $node2->value) {
            return $node1->value;
        }

        if (!$node1->parent) {
            return $node1->value;
        }

        if (!$node2->parent) {
            return $node2->value;
        }

        $depthDifference = $node1->getDepth() - $node2->getDepth();

        if ($depthDifference < 0) {
            $temp = $node1;
            $node1 = $node2;
            $node2 = $temp;
            $depthDifference = abs($depthDifference);
        }

        while ($depthDifference) {
            $node1 = $node1->parent;
            $depthDifference--;
        }

        while ($node1 && $node2) {
            if ($node1->value == $node2->value) {
                return $node1->value;
            }
            $node1 = $node1->parent;
            $node2 = $node2->parent;
        }

        return null;
    }
}

