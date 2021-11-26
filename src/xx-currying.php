<?php 

class lambda
{
    private $f;
    private $args;
    private $count;
    public function __construct($f, $args = [])
    {
        if ($f instanceof lambda) {
            $this->f = $f->f;
            $this->count = $f->count;
            $this->args = array_merge($f->args, $args);
        }
        else {
            $this->f = $f;
            $this->count = count((new ReflectionFunction($f))->getParameters());
            $this->args = $args;
        }
    }

    public function __invoke()
    {
        if (count($this->args) + func_num_args() < $this->count) {
            return new lambda($this, func_get_args());
        }
        else {
            $args = array_merge($this->args, func_get_args());
            $r = call_user_func_array($this->f, array_splice($args, 0, $this->count));
            return is_callable($r) ? call_user_func(new lambda($r, $args)) : $r;
        }
    }
}
function lambda($f)
{
    return new lambda($f);
}


$add = lambda(function($a, $b) { 
    return $a + $b; 
});

$add_5 = lambda(function($a, $b,$c, $d,$e) { 
    return $a + $b + $c + $d + $e; 
});   

$add1 = $add(1);
$add2 = $add1(2); // 3

$add4 = $add_5(1)(1)(1)(1);
$add5 = $add_5(1)(1)(1)(1)(1);


var_dump($add2, $add5, is_callable($add4));