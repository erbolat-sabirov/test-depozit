<?php

namespace App\Helpers;

class CalcDepozit
{
    
    public static function run($amount, $percent = 20)
    {
        return $amount * ($percent / 100);
    }
}