<?php

// Higher-order functions are functions that can either take other functions as arguments or return them as results.

// by class 
class A
{
    public function __invoke(...$arguments)
    {
        var_dump(__FUNCTION__, $arguments);
    }
    public function someMethodName() {
        $this->__invoke('someMethodName');
    }
}

$aFunction = new A();
$aFunction(1, 2);

function someFunctionName(...$arguments)
{
    var_dump(__FUNCTION__, $arguments);
}

$bFunction = 'someFunctionName';
$bFunction();
$cMethod = [$aFunction, 'someMethodName'];
$cMethod();