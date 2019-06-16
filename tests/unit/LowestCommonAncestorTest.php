<?php

use PHPUnit\Framework\TestCase;
use App\Node;
use App\LowestCommonAncestor;

class LowestCommonAncestorTest extends TestCase
{
    /**
     * @dataProvider lowestCommonAncestorDataProvider
     */
    public function testLowestCommonAncestor($node1, $node2, $expected)
    {
        $this->assertEquals((new LowestCommonAncestor())->lca($node1, $node2), $expected);
    }

    public function lowestCommonAncestorDataProvider() {
        $n1 = new Node(1, NULL);
        $n2 = new Node(2, $n1);
        $n3 = new Node(3, $n1);
        $n4 = new Node(4, $n2);
        $n5 = new Node(5, $n2);
        $n6 = new Node(6, $n3);
        $n7 = new Node(7, $n3);
        $n8 = new Node(8, $n4);
        $n9 = new Node(9, $n4);
        return [
            [$n6, $n7, 3],
            [$n5, $n7, 1],
            [$n3, $n7, 3]
        ];
    }
}