<?php

namespace System\Helpers;

class Arr
{
    public static function retMulti($array, $col = 'id')
    {
        return empty(array_count_values(array_column($array, $col))) ? [$array] : $array;
    }

    public static function flatten($array = [])
    {
        $c = [];

        if (gettype($array) == 'string') {
            $tmp = $array;
            $array = [];
            $array[] = ['ip_add' => $tmp];
        }

        foreach ($array as $val) {
            $c[] = current($val);
        }
        return $c;
    }

    public static function pre($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}