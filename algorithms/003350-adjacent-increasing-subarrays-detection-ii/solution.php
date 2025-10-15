<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxIncreasingSubarrays($nums) {
        $n = count($nums);

        // Precompute the length of increasing sequence starting at each position
        $inc = array_fill(0, $n, 1);
        for ($i = $n - 2; $i >= 0; $i--) {
            if ($nums[$i] < $nums[$i + 1]) {
                $inc[$i] = $inc[$i + 1] + 1;
            } else {
                $inc[$i] = 1;
            }
        }

        // Binary search for maximum k
        $left = 1;
        $right = intval($n / 2);
        $answer = 0;

        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);

            if ($this->isValid($nums, $inc, $mid, $n)) {
                $answer = $mid;
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $answer;
    }


    /**
     * Check if there exists two adjacent increasing subarrays of length k
     *
     * @param $nums
     * @param $inc
     * @param $k
     * @param $n
     * @return bool
     */
    function isValid($nums, $inc, $k, $n) {
        // We need to find position i where both [i, i+k-1] and [i+k, i+2k-1] are increasing
        for ($i = 0; $i <= $n - 2 * $k; $i++) {
            // Check if first subarray is increasing
            if ($inc[$i] >= $k) {
                // Check if second subarray is increasing
                if ($inc[$i + $k] >= $k) {
                    return true;
                }
            }
        }
        return false;
    }
}