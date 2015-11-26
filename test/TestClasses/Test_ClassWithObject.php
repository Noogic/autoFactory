<?php


namespace TestAutoFactory\TestClasses;


class Test_ClassWithObject {
    private $object;

    public function __construct(Test_SimpleClass $object){
        $this->object = $object;
    }
}
