<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSum($nums) {
        $max_val = max($nums);
        if ($max_val < 0) {
            return $max_val;
        }
        $set = array();
        $sum = 0;
        foreach ($nums as $num) {
            if ($num >= 0 && !isset($set[$num])) {
                $set[$num] = true;
                $sum += $num;
            }
        }
        return $sum;
    }
}