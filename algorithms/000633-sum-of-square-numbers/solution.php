<?php

class Solution {

    /**
     * @param Integer $c
     * @return Boolean
     */
    function judgeSquareSum($c) {
        // Initialize two pointers
        $a = 0;
        $b = (int) sqrt($c);

        // Iterate while a <= b
        while ($a <= $b) {
            $sumOfSquares = $a * $a + $b * $b;

            if ($sumOfSquares == $c) {
                return true; // Found a pair (a, b)
            } elseif ($sumOfSquares < $c) {
                $a++; // Increment a to increase sum
            } else {
                $b--; // Decrement b to decrease sum
            }
        }

        return false; // No such pair exists
    }
}