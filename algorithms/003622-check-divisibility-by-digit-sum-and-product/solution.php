<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function checkDivisibility(int $n): bool
    {
        $sum = 0;
        $product = 1;
        $num = $n;
        $hasDigit = false;

        while ($num > 0) {
            $digit = $num % 10;
            $sum += $digit;
            $product *= $digit;
            $num = intval($num / 10);
            $hasDigit = true;
        }

        // If n is a single digit, product might be 0 if digit is 0, but n >= 1, so no zero digits.
        $divisor = $sum + $product;

        return $n % $divisor == 0;
    }
}