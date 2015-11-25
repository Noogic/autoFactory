<?php
function array_get(array $array, $key, $default = null){
    return isset($array[$key]) ? $array[$key] : $default;
}
