<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function firstStableIndex(array $nums, int $k): int
    {
        $n = count($nums);

        // Edge case: if only one element
        if ($n == 1) {
            return ($nums[0] - $nums[0] <= $k) ? 0 : -1;
        }

        // Precompute prefix maximums
        $prefixMax = array_fill(0, $n, 0);
        $prefixMax[0] = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            $prefixMax[$i] = max($prefixMax[$i-1], $nums[$i]);
        }

        // Precompute suffix minimums
        $suffixMin = array_fill(0, $n, 0);
        $suffixMin[$n-1] = $nums[$n-1];
        for ($i = $n-2; $i >= 0; $i--) {
            $suffixMin[$i] = min($suffixMin[$i+1], $nums[$i]);
        }

        // Check each index
        for ($i = 0; $i < $n; $i++) {
            $instability = $prefixMax[$i] - $suffixMin[$i];
            if ($instability <= $k) {
                return $i;
            }
        }

        return -1;
    }
}