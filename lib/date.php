<?php

class D
{

    public static function init()
    {
        date_default_timezone_set('UTC');
    }

    public static function now()
    {

        return time();
    }
}