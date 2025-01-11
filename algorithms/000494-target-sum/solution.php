<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function findTargetSumWays($nums, $target) {
        // Step 1: Calculate total sum
        $totalSum = array_sum($nums);

        // Step 2: Validate the target
        if (($totalSum + $target) % 2 != 0 || $totalSum < abs($target)) {
            return 0;
        }
        $S = ($totalSum + $target) / 2;

        // Step 3: Initialize DP array
        $dp = array_fill(0, $S + 1, 0);
        $dp[0] = 1; // There's one way to form sum 0 (no elements)

        // Step 4: Populate DP array
        foreach ($nums as $num) {
            for ($j = $S; $j >= $num; $j--) {
                $dp[$j] += $dp[$j - $num];
            }
        }

        // Step 5: Return the number of ways to achieve the target sum
        return $dp[$S];
    }
}