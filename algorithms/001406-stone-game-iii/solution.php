<?php

class Solution {

    /**
     * @param Integer[] $stoneValue
     * @return String
     */
    function stoneGameIII(array $stoneValue): string
    {
        $n = count($stoneValue);
        $dp = array_fill(0, $n + 1, 0);

        // Work backwards
        for ($i = $n - 1; $i >= 0; $i--) {
            $dp[$i] = PHP_INT_MIN;
            $sum = 0;

            // Try taking 1, 2, or 3 stones
            for ($k = 1; $k <= 3 && $i + $k - 1 < $n; $k++) {
                $sum += $stoneValue[$i + $k - 1];
                $dp[$i] = max($dp[$i], $sum - $dp[$i + $k]);
            }
        }

        if ($dp[0] > 0) {
            return "Alice";
        } elseif ($dp[0] < 0) {
            return "Bob";
        } else {
            return "Tie";
        }
    }
}