<?php

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function stoneGameVIII(array $stones): int
    {
        $n = count($stones);

        // Build prefix sums
        $prefix = [];
        $prefix[0] = $stones[0];
        for ($i = 1; $i < $n; $i++) {
            $prefix[$i] = $prefix[$i - 1] + $stones[$i];
        }

        // dp[i] = maximum score difference current player can get
        // when game starts with merged value prefix[i]
        $dp = array_fill(0, $n, PHP_INT_MIN);

        // Base case: when only two stones left, must take all
        $dp[$n - 2] = $prefix[$n - 1];

        // Fill dp from right to left
        for ($i = $n - 3; $i >= 0; $i--) {
            $dp[$i] = max($dp[$i + 1], $prefix[$i + 1] - $dp[$i + 1]);
        }

        return $dp[0];
    }
}