<?php

require_once("vendor/autoload.php");

use FunctionalPHP\PatternMatching as m;


$fact = m\func([
    '0' => 1,
    'n' => function($n) use(&$fact) {
        return $n * $fact($n - 1);
    }
]);

$head = m\func([
    '(x:_)' => function($x) { return $x; },
    '_' => function() { throw new RuntimeException('empty list'); }
]);

$firstThree= m\func([
    '(x:y:z:_)' => function($x, $y, $z) { return [$x, $y, $z]; },
    '_' => function() { throw new RuntimeException('need at least 3 elements'); }
]);

var_dump($fact(10));