<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $x
     * @return Integer
     */
    function minOperations(array $nums, $x): int
    {
        $n = count($nums);
        $total = array_sum($nums);

        // We need to remove elements from both ends summing to x.
        // Equivalently, keep the longest middle subarray with sum = total - x.
        $target = $total - $x;

        if ($target < 0) {
            return -1;
        }

        // If total == x, remove all elements.
        if ($target == 0) {
            return $n;
        }

        $left = 0;
        $sum = 0;
        $maxLen = 0;

        for ($right = 0; $right < $n; $right++) {
            $sum += $nums[$right];

            while ($sum > $target && $left <= $right) {
                $sum -= $nums[$left];
                $left++;
            }

            if ($sum == $target) {
                $maxLen = max($maxLen, $right - $left + 1);
            }
        }

        return $maxLen > 0 ? $n - $maxLen : -1;
    }
}