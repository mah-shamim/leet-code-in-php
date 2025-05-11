<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countSubarrays($nums, $k) {
        $n = count($nums);
        $prefix = array_fill(0, $n + 1, 0);
        for ($i = 0; $i < $n; $i++) {
            $prefix[$i + 1] = $prefix[$i] + $nums[$i];
        }
        $count = 0;
        for ($i = 0; $i < $n; $i++) {
            $low = $i;
            $high = $n - 1;
            $best_j = -1;
            while ($low <= $high) {
                $mid = (int)(($low + $high) / 2);
                $sum = $prefix[$mid + 1] - $prefix[$i];
                $length = $mid - $i + 1;
                $product = $sum * $length;
                if ($product < $k) {
                    $best_j = $mid;
                    $low = $mid + 1;
                } else {
                    $high = $mid - 1;
                }
            }
            if ($best_j != -1) {
                $count += ($best_j - $i + 1);
            }
        }
        return $count;
    }
}