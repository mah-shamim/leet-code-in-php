<?php

class Solution {

    /**
     * @param Integer $k
     * @return Integer
     */
    function smallestRepunitDivByK($k) {
        // If k is even or divisible by 5, no solution exists
        // because numbers ending with 1 can't be divisible by 2 or 5
        if ($k % 2 == 0 || $k % 5 == 0) {
            return -1;
        }

        $remainder = 0;

        // Try up to k iterations - if we don't find 0 by then, it doesn't exist
        for ($length = 1; $length <= $k; $length++) {
            // Build the number: remainder = (remainder * 10 + 1) % k
            $remainder = ($remainder * 10 + 1) % $k;

            // If remainder becomes 0, we found our answer
            if ($remainder == 0) {
                return $length;
            }
        }

        return -1;
    }
}