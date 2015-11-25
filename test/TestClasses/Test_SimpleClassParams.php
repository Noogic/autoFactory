<?php


namespace TestAutoFactory\TestClasses;


class Test_SimpleClassParams {
    public $a;
    public $b;
    public $c;
    public $d;

    public function __construct($a = null, $b = null, $c = null, $d = null){
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
    }
}
