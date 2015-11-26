<?php


namespace AutoFactory;


class Factory {
    public function get($id, $data = null){
        $reflectionClass = new \ReflectionClass($id);
        if(!$reflectionClass->hasMethod('__construct'))
            return new $id;

        $params = $this->getConstructorParams( $id );
        $values = $this->getValues($data, $params);

        $instance = $reflectionClass->newInstanceArgs($values);

        return $instance;
    }


    /**
     * @param $id
     * @return \ReflectionParameter[]
     */
    private function getConstructorParams ( $id ) {
        $reflectionMethod = new \ReflectionMethod( $id, '__construct' );
        $params = $reflectionMethod->getParameters();

        return $params;
    }

    /**
     * @param $data
     * @param $params
     * @return array
     */
    private function getValues ( $data, $params ) {
        $values = [];

        foreach ( $params as $param ) {
            $key = $param->name;

            $values[$key] = array_get( $data, $key );
        }

        return $values;
    }
}
