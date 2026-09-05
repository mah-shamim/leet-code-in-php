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

        // Compute prefix maximums
        $prefMax = array_fill(0, $n, 0);
        $prefMax[0] = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            $prefMax[$i] = max($prefMax[$i - 1], $nums[$i]);
        }

        // Compute suffix minimums
        $suffMin = array_fill(0, $n, 0);
        $suffMin[$n - 1] = $nums[$n - 1];
        for ($i = $n - 2; $i >= 0; $i--) {
            $suffMin[$i] = min($suffMin[$i + 1], $nums[$i]);
        }

        // Check each index
        for ($i = 0; $i < $n; $i++) {
            $instability = $prefMax[$i] - $suffMin[$i];
            if ($instability <= $k) {
                return $i;
            }
        }

        return -1;
    }
}