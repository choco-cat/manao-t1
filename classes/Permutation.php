<?php
/**
 * Permutation class
 */

namespace classes;

class Permutation
{
    public $inputString;
    public $countElements;
    public $stringLength;

    public function __construct($inputString, $countElements)
    {
        $this->inputString = $inputString;
        $this->countElements = $countElements;
        $this->stringLength = strlen($inputString);
    }

    public function getCountPositions()
    {
        return $this->factorial($this->stringLength) / $this->factorial($this->stringLength - $this->countElements);
    }

    public function showPermutations()
    {
        $this->calcPermutations($this->inputString, $this->stringLength, $this->countElements);
    }

    private function factorial($n)
    {
        if ($n <= 1) {
            return 1;
        } else {
            return $n * $this->factorial($n - 1);
        }
    }

    private function calcPermutations($str, $n, $k, $result = '')
    {
        if ($k === 0) {
            echo $result . '<br>';
        } else {
            for ($i = 0; $i <= $n - 1; $i++) {
                $tempVar = $str[$i];
                $str[$i] = $str[$n - 1];
                $this->calcPermutations($str, $n - 1, $k - 1, $result . $tempVar);
                $str[$i] = $tempVar;
            }
        }
    }
}
