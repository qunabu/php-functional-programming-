<?php

function add($a, $b) {
    return $a + $b;
}

function mult($a, $b) {
    return $a * $b;
}

$x = add(2, mult(3, 4));

var_dump($x);