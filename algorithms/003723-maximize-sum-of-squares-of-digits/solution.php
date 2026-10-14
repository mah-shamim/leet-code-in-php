<?php

class Solution {

    /**
     * @param Integer $num
     * @param Integer $sum
     * @return String
     */
    function maxSumOfSquares(int $num, int $sum): string
    {
        // Impossible: even all 9s cannot reach the required sum.
        if ($sum > 9 * $num) {
            return "";
        }

        $q = intdiv($sum, 9); // number of 9s
        $r = $sum % 9;        // remaining digit

        if ($r == 0) {
            return str_repeat('9', $q) . str_repeat('0', $num - $q);
        }

        return str_repeat('9', $q) . $r . str_repeat('0', $num - $q - 1);
    }
}