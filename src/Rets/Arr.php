<?php

namespace DevDept\Rets;

class Arr
{
    static function dot($array, $doNotDot = [], $prepend = '')
    {
        $results = [];
        
        foreach ($array as $key => $value) {
            if (! in_array($key, $doNotDot) && is_array($value)) {
                $results = array_merge($results, static::dot($value, [], $prepend.$key.'.'));
            } else {
                $results[$prepend.$key] = $value;
            }
        }
        
        return $results;
    }
}