<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumSubarraySum($nums, $k) {
        $n = count($nums);
        $maxSum = 0;
        $currentSum = 0;
        $freq = array(); // To track frequency of elements in the current window

        for ($i = 0; $i < $n; $i++) {
            // Add new element to the current sum and frequency map
            $currentSum += $nums[$i];
            $freq[$nums[$i]] = isset($freq[$nums[$i]]) ? $freq[$nums[$i]] + 1 : 1;

            // If the window size exceeds k, remove the leftmost element
            if ($i >= $k) {
                $currentSum -= $nums[$i - $k];
                $freq[$nums[$i - $k]]--;
                if ($freq[$nums[$i - $k]] === 0) {
                    unset($freq[$nums[$i - $k]]);
                }
            }

            // If the current window has exactly k elements and all are distinct
            if ($i >= $k - 1) {
                if (count($freq) === $k) {
                    $maxSum = max($maxSum, $currentSum);
                }
            }
        }

        return $maxSum;
    }
}