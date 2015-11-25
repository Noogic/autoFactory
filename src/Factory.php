<?php


namespace AutoFactory;


class Factory {
    public function get($id, $data){
        $reflectionClass = new \ReflectionClass($id);
        if(!$reflectionClass->hasMethod('__construct'))
            return new $id;

        $reflectionMethod = new \ReflectionMethod($id, '__construct');
        $params = $reflectionMethod->getParameters();

        $args = [];

        foreach ( $params as $param ) {
            $key = $param->name;

            $args[$key] = array_get($data, $key);
        }

        $instance = $reflectionClass->newInstanceArgs($args);

        return $instance;
    }
}
