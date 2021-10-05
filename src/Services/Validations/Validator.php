<?php

namespace Cryptum\Services\Validations;


class Validator
{

    static function is_required(array $args, string $field)
    {
        if (!array_key_exists($field, $args)) {
            throw new \Exception($field . ' is a required field');
        }
    }

    static function is_int(string $key, $value){
        if(!is_int($value)){
            throw new \Exception($key . ' must be integer type');
        }
    }

    static function is_string(string $key, $value){
        if(!is_string($value)){
            throw new \Exception($key . ' must be string type');
        }        
    }
}
