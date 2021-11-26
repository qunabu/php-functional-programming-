<?php 

$files = glob("*");




foreach ($files as $file) {
    print sprintf("<a href='%s'>%s</a><br/>", $file, $file);    
};