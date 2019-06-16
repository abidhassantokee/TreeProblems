<?php

namespace App;

class PrintDepth
{
    /**
     * Prints depth of a nested array
     *
     * @param $data
     * @param int $depth
     */
    public function printDepthArrayAndObject($data, $depth = 1)
    {
        foreach ($data as $key => $datum) {
            echo $key . ' ' . $depth . '<br>';
            if (is_array($datum)) {
                $this->printDepthArrayAndObject($datum, ++$depth);
            }
            if ($datum instanceof Person) {
                $this->printDepthArrayAndObject((array)$datum, ++$depth);
            }
        }
    }

    /**
     * Prints depth of a nested array
     *
     * @param $data
     * @param int $depth
     */
    public function printDepthOnlyArray($data, $depth = 1)
    {
        foreach ($data as $key => $datum) {
            echo $key . ' ' . $depth . '<br>';
            if (is_array($datum)) {
                $this->printDepthOnlyArray($datum, ++$depth);
            }
        }
    }
}

