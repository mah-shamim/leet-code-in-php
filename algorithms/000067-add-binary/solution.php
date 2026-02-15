<?php

class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary(string $a, string $b): string
    {
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        $carry = 0;
        $result = '';

        while ($i >= 0 || $j >= 0 || $carry) {
            $sum = $carry;

            if ($i >= 0) {
                $sum += intval($a[$i]);
                $i--;
            }
            if ($j >= 0) {
                $sum += intval($b[$j]);
                $j--;
            }

            // current bit = sum % 2, carry = floor(sum / 2)
            $result .= (string)($sum % 2);
            $carry = intdiv($sum, 2);
        }

        // The result was built from least significant bit to most,
        // so we need to reverse it.
        return strrev($result);
    }
}