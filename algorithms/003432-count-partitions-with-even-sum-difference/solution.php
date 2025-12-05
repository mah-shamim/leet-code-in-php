<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countPartitions($nums) {
        $totalSum = array_sum($nums);
        $n = count($nums);

        // If total sum is even, every partition is valid
        if ($totalSum % 2 == 0) {
            return $n - 1;
        }

        // If total sum is odd, no partition is valid
        return 0;
    }
}