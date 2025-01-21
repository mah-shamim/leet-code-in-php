<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function minSteps($n) {
        // If n is 1, no operations are needed
        if ($n == 1) return 0;

        // Initialize DP array with a large number
        $dp = array_fill(0, $n + 1, PHP_INT_MAX);
        $dp[1] = 0;

        // Fill DP array
        for ($i = 2; $i <= $n; $i++) {
            // Check all divisors of i
            for ($d = 1; $d <= sqrt($i); $d++) {
                if ($i % $d == 0) {
                    // If d is a divisor
                    $dp[$i] = min($dp[$i], $dp[$d] + ($i / $d));

                    // If i / d is a divisor and not equal to d
                    if ($d != $i / $d) {
                        $dp[$i] = min($dp[$i], $dp[$i / $d] + $d);
                    }
                }
            }
        }

        return $dp[$n];
    }
}