<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumCost(array $nums): int
    {
        $n = count($nums);
        $minCost = PHP_INT_MAX;

        // The first subarray always starts at index 0
        $firstCost = $nums[0];

        // Try all possible split points
        for ($i = 1; $i <= $n - 2; $i++) {
            for ($j = $i + 1; $j <= $n - 1; $j++) {
                $currentCost = $firstCost + $nums[$i] + $nums[$j];
                $minCost = min($minCost, $currentCost);
            }
        }

        return $minCost;
    }
}