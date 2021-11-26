<?php    
function display($number) {    
    if($number<=5){    
     echo __FUNCTION__." $number \n";    
     display($number+1);    
    }  
}    
    
display(1);    

// Trampolines are a technique used to avoid blowing the call stack when doing recursive calls. This is needed because PHP does not perform tail-call optimization.
// 
// https://github.com/functional-php/trampoline