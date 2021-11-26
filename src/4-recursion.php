<?php    

require_once("vendor/autoload.php");


function display($number) {    
    if($number<=5){    
     echo __FUNCTION__." $number \n";    
     display($number+1);    
    }  
}    
    
display(1);    

// Trampolines are a technique used to avoid blowing the call stack when doing recursive calls. This is needed because PHP does not perform tail-call optimization.
// 

use FunctionalPHP\Trampoline as T;

function factorial($n, $acc = 1) {
    return $n <= 1 ? $acc : T\bounce('factorial', $n - 1, $n * $acc);
};

echo T\trampoline('factorial', 5);

// https://github.com/functional-php/trampoline