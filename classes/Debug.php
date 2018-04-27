<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 27/04/2018
 * Time: 10:25
 */


class Debug
{
    public static function dump($test)
    {
        echo "<pre>";
        var_dump($test);
        echo "</pre>";
    }
}