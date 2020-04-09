<?php

namespace App\Helpers;

class MoneyHelper
{
    public static function formatMoney($value)
    {
        $number = '';

        if (!empty($value)) {
            $value = (float) $value;
            $number = number_format($value, 2, ',', '.');
        }

        return $number;
    }
}
