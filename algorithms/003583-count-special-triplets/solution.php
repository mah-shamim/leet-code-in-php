<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function specialTriplets($nums) {
        $MOD = 1000000007;
        $n = count($nums);

        // Frequency maps
        $leftFreq = [];
        $rightFreq = [];

        // Initialize right frequency with all elements
        foreach ($nums as $num) {
            $rightFreq[$num] = ($rightFreq[$num] ?? 0) + 1;
        }

        $total = 0;

        for ($j = 0; $j < $n; $j++) {
            // Remove current element from right frequency
            $rightFreq[$nums[$j]]--;

            // Calculate target value = 2 * nums[j]
            $target = $nums[$j] * 2;

            // Get counts from left and right
            $leftCount = $leftFreq[$target] ?? 0;
            $rightCount = $rightFreq[$target] ?? 0;

            // Add to total (modulo 10^9+7)
            $total = ($total + ($leftCount * $rightCount)) % $MOD;

            // Add current element to left frequency
            $leftFreq[$nums[$j]] = ($leftFreq[$nums[$j]] ?? 0) + 1;
        }

        return $total;
    }
}