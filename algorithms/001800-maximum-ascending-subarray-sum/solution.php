<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAscendingSum($nums) {
        $max_sum = $current_sum = $nums[0];
        $n = count($nums);
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] > $nums[$i-1]) {
                $current_sum += $nums[$i];
            } else {
                $current_sum = $nums[$i];
            }
            if ($current_sum > $max_sum) {
                $max_sum = $current_sum;
            }
        }
        return $max_sum;
    }
}