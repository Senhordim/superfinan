<?php

namespace SFinan\Utils;
use NumberFormatter;

abstract class FCurrency
{

    public static function toBRL(float $value) : string
    {
        $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($value, 'BRL');
    }
}
