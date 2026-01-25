<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minimumDifference(array $nums, int $k): int
    {
        // Edge case: if k is 1, difference is always 0
        if ($k == 1) {
            return 0;
        }

        // Sort the array
        sort($nums);

        // Initialize minimum difference with a large value
        $minDiff = PHP_INT_MAX;

        // Use sliding window of size k on sorted array
        for ($i = 0; $i <= count($nums) - $k; $i++) {
            // Calculate difference between highest and lowest in current window
            $diff = $nums[$i + $k - 1] - $nums[$i];

            // Update minimum difference if current is smaller
            if ($diff < $minDiff) {
                $minDiff = $diff;
            }
        }

        return $minDiff;
    }
}