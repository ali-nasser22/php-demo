<?php

namespace helpers;

class App
{

    protected static object $container;

    public static function addContainer($container): void
    {
        self::$container = $container;
    }

    public static function bind($key, $resolver)
    {
        self::container()->bind($key, $resolver);
    }

    public static function container(): object
    {
        return self::$container;
    }

    public static function resolve($key)
    {
        return self::container()->resolve($key);
    }

}