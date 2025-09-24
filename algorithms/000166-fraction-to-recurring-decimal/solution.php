<?php

class Solution {

    /**
     * @param Integer $numerator
     * @param Integer $denominator
     * @return String
     */
    function fractionToDecimal($numerator, $denominator) {
        if ($numerator == 0) {
            return "0";
        }

        $sign = "";
        if (($numerator < 0) ^ ($denominator < 0)) {
            $sign = "-";
        }

        $numerator = abs($numerator);
        $denominator = abs($denominator);

        $integerPart = intval($numerator / $denominator);
        $remainder = $numerator % $denominator;

        if ($remainder == 0) {
            return $sign . $integerPart;
        }

        $fractionalPart = "";
        $remainderMap = [];

        while ($remainder != 0) {
            if (isset($remainderMap[$remainder])) {
                $startIndex = $remainderMap[$remainder];
                $fractionalPart = substr($fractionalPart, 0, $startIndex) . '(' . substr($fractionalPart, $startIndex) . ')';
                break;
            }

            $remainderMap[$remainder] = strlen($fractionalPart);
            $remainder *= 10;
            $fractionalPart .= intval($remainder / $denominator);
            $remainder %= $denominator;
        }

        return $sign . $integerPart . '.' . $fractionalPart;
    }
}