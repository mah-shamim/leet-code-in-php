<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function rangeSum($nums, $n, $left, $right) {
        $MOD = 1000000007;
        $sums = array();

        // Generate all subarray sums
        for ($i = 0; $i < $n; $i++) {
            $current_sum = 0;
            for ($j = $i; $j < $n; $j++) {
                $current_sum += $nums[$j];
                $sums[] = $current_sum;
            }
        }

        // Sort the sums array
        sort($sums);

        // Calculate the sum of the elements from left to right (1-based index)
        $total = 0;
        for ($i = $left - 1; $i <= $right - 1; $i++) {
            $total = ($total + $sums[$i]) % $MOD;
        }

        return $total;

    }
}