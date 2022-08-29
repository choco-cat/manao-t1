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

    private function factorial($n)
    {
        if ($n <= 1) {
            return 1;
        } else {
            return $n * $this->factorial($n - 1);
        }
    }

    public function getCountPositions()
    {
        return $this->factorial($this->stringLength) / $this->factorial($this->stringLength - $this->countElements);
    }
}
