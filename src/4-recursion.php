<?php    
function display($number) {    
    if($number<=5){    
     echo __FUNCTION__." $number \n";    
     display($number+1);    
    }  
}    
    
display(1);    