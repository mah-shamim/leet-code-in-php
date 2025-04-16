<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countGood($nums, $k) {
        $n = count($nums);
        $left = 0;
        $right = 0;
        $sum_pairs = 0;
        $result = 0;
        $frequency = array();

        while ($left < $n) {
            // Expand the window as long as sum_pairs is less than k
            while ($right < $n && $sum_pairs < $k) {
                $x = $nums[$right];
                $current_freq = isset($frequency[$x]) ? $frequency[$x] : 0;
                $sum_pairs += $current_freq;
                $frequency[$x] = $current_freq + 1;
                $right++;
            }
            // If sum_pairs is at least k, add all subarrays starting at left and ending from right-1 to n-1
            if ($sum_pairs >= $k) {
                $result += ($n - $right + 1);
            }
            // Remove the left element from the window
            $x = $nums[$left];
            $current_freq = $frequency[$x];
            $sum_pairs -= ($current_freq - 1);
            $frequency[$x]--;
            if ($frequency[$x] == 0) {
                unset($frequency[$x]);
            }
            $left++;
        }
        return $result;
    }
}