<?php

namespace helpers;

class Validator
{

    public static function required($value): bool
    {
        return strlen(trim($value)) > 0;
    }

    public static function min($value, $min): bool
    {
        return strlen(trim($value)) > $min;
    }

    public static function max($value, $max): bool
    {
        return strlen(trim($value)) < $max;
    }

    public static function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


}