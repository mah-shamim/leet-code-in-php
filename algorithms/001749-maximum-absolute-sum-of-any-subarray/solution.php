<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAbsoluteSum($nums) {
        $n = count($nums);
        if ($n == 0) return 0;

        // Compute maximum subarray sum (non-empty)
        $current_max = $nums[0];
        $global_max = $current_max;
        for ($i = 1; $i < $n; $i++) {
            $current_max = max($nums[$i], $current_max + $nums[$i]);
            $global_max = max($global_max, $current_max);
        }
        $max_sum = max($global_max, 0);

        // Compute minimum subarray sum (non-empty)
        $current_min = $nums[0];
        $global_min = $current_min;
        for ($i = 1; $i < $n; $i++) {
            $current_min = min($nums[$i], $current_min + $nums[$i]);
            $global_min = min($global_min, $current_min);
        }
        $min_sum = min($global_min, 0);

        return max(abs($max_sum), abs($min_sum));
    }
}