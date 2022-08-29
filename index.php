<?php

use classes\Permutation;

define('BASE_PATH', dirname(realpath(__FILE__)) . '/');
include (BASE_PATH . 'helpers/autoload.php');

$permutationObject = new Permutation('12345', 3);
echo $permutationObject->getCountPositions();
