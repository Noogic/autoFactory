<?php

namespace TestAutoFactory;

use AutoFactory\Factory;

require_once __DIR__ . '/../bootstrap/autoload.php';

class FactoryTest extends \PHPUnit_Framework_TestCase {
    /** @var \AutoFactory\Factory $factory */
    protected $factory;
    protected $classes_namespace = 'TestAutoFactory\TestClasses\\';

    public function setUp(){
        $this->factory = new Factory();
    }


    public function test_factory_get_simple_instance(){
        $class = $this->classes_namespace . 'Test_SimpleClass';
        $instance = $this->factory->get($class, []);

        $this->assertInstanceOf($class, $instance);
    }

    public function test_factory_get_simple_instance_with_integer(){
        $class = $this->classes_namespace . 'Test_SimpleClassParams';
        $data = [
          'a' => 5
        ];

        $instance = $this->factory->get($class, $data);


        $this->assertEquals($data['a'], $instance->a);
    }
}
