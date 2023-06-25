<?php

namespace SFinan\Utils;

abstract class FDate
{

    public static function toBR(string $value) : string
    {
        return date('d/m/Y', intval($value));
    }
}
