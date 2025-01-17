<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSumOfThreeSubarrays($nums, $k) {
        $n = count($nums);

        // Step 1: Calculate all the subarray sums of length k
        $sum = [];
        $windowSum = 0;
        for ($i = 0; $i < $k; $i++) {
            $windowSum += $nums[$i];
        }
        $sum[0] = $windowSum;
        for ($i = $k; $i < $n; $i++) {
            $windowSum += $nums[$i] - $nums[$i - $k];
            $sum[$i - $k + 1] = $windowSum;
        }

        // Step 2: Dynamic programming for left and right max sums
        $left = [];
        $right = [];
        $leftMaxSum = 0;
        for ($i = 0; $i < $n - $k + 1; $i++) {
            if ($sum[$i] > $sum[$leftMaxSum]) {
                $leftMaxSum = $i;
            }
            $left[$i] = $leftMaxSum;
        }

        $rightMaxSum = $n - $k;
        for ($i = $n - $k; $i >= 0; $i--) {
            if ($sum[$i] >= $sum[$rightMaxSum]) {
                $rightMaxSum = $i;
            }
            $right[$i] = $rightMaxSum;
        }

        // Step 3: Find the best middle subarray and combine with left and right
        $maxSum = 0;
        $result = [];
        for ($j = $k; $j <= $n - 2 * $k; $j++) {
            $i = $left[$j - $k];
            $l = $right[$j + $k];
            $totalSum = $sum[$i] + $sum[$j] + $sum[$l];
            if ($totalSum > $maxSum) {
                $maxSum = $totalSum;
                $result = [$i, $j, $l];
            }
        }

        return $result;
    }
}