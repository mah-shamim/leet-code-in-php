<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function sumAndMultiply(int $n): int
    {
        $digits = str_split((string) $n);
        $nonZeroDigits = array_filter($digits, fn($d) => $d !== '0');

        if (empty($nonZeroDigits)) {
            return 0;
        }

        $x = (int) implode('', $nonZeroDigits);
        $sum = array_sum($nonZeroDigits);

        return $x * $sum;
    }
}