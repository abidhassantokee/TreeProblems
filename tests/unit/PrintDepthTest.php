<?php

use PHPUnit\Framework\TestCase;
use App\Person;
use App\PrintDepth;

class PrintDepthTest extends TestCase
{
    public function testPrintDepthOnlyArray()
    {
        $a = array(
            'key1' => 1,
            'key2' => array(
                'key3' => 1,
                'key4' => array(
                    'key5' => 4
                ),
            ),
        );

        ob_start();
        (new PrintDepth())->printDepthOnlyArray($a);
        $this->assertEquals(ob_get_contents(), 'key1 1<br>key2 1<br>key3 2<br>key4 2<br>key5 3<br>');
        ob_end_clean();
    }

    public function testPrintDepthArrayAndObject()
    {
        $personA = new Person('User', '1', NULL);
        $personB = new Person('User', '2', $personA);

        $a = array(
            'key1' => 1,
            'key2' => array(
                'key3' => 1,
                'key4' => array(
                    'key5' => 4,
                    'User' => $personB,
                ),
            ),
        );

        ob_start();
        (new PrintDepth())->printDepthOnlyArray($a);
        $this->assertEquals(ob_get_contents(), 'key1 1<br>key2 1<br>key3 2<br>key4 2<br>key5 3<br>User 3<br>');
        ob_end_clean();
    }
}