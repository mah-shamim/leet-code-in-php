<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumMountainRemovals($nums) {
        $n = count($nums);

        // Step 1: Calculate leftLIS (Longest Increasing Subsequence from left to right)
        $leftLIS = array_fill(0, $n, 1);
        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$j] < $nums[$i]) {
                    $leftLIS[$i] = max($leftLIS[$i], $leftLIS[$j] + 1);
                }
            }
        }

        // Step 2: Calculate rightLIS (Longest Increasing Subsequence from right to left)
        $rightLIS = array_fill(0, $n, 1);
        for ($i = $n - 2; $i >= 0; $i--) {
            for ($j = $n - 1; $j > $i; $j--) {
                if ($nums[$j] < $nums[$i]) {
                    $rightLIS[$i] = max($rightLIS[$i], $rightLIS[$j] + 1);
                }
            }
        }

        // Step 3: Find the maximum length of a mountain sequence
        $maxMountainLength = 0;
        for ($i = 1; $i < $n - 1; $i++) {
            if ($leftLIS[$i] > 1 && $rightLIS[$i] > 1) { // Valid peak
                $maxMountainLength = max($maxMountainLength, $leftLIS[$i] + $rightLIS[$i] - 1);
            }
        }

        // Step 4: Calculate minimum removals
        return $n - $maxMountainLength;
    }
}