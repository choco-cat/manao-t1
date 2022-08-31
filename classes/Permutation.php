<?php
/**
 * Permutation class
 */

namespace classes;

use Exception;

class Permutation
{
    public $inputString;
    public $countElements;
    public $stringLength;

    public function __construct($inputString, $countElements)
    {
        $this->inputString = $inputString;
        $this->countElements = $countElements ?? strlen($inputString);
        $this->stringLength = strlen($inputString);
        if (empty($this->inputString)) {
            throw new Exception('String can\'t be empty.');
        }
        if ($this->stringLength < $this->countElements) {
            throw new Exception(
                'The number of elements in a permutation'
                . ' cannot be greater than the length of the string.'
            );
        }
    }

    public function getCountPositions()
    {
        try {
            return
                $this->factorial($this->stringLength) /
                $this->factorial($this->stringLength - $this->countElements);
        } catch (Exception $e) {
            echo 'Calculation error!';
            die();
        }
    }

    public function showPermutations()
    {
        try {
            $this->calcPermutations(
                $this->inputString,
                $this->stringLength,
                $this->countElements
            );
        } catch(Exception $e) {
            echo 'Calculation error!';
            die();
        }
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
