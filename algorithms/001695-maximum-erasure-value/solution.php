<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumUniqueSubarray($nums) {
        $n = count($nums);
        $max_sum = 0;
        $current_sum = 0;
        $freq = array_fill(0, 10001, 0);
        $left = 0;

        for ($right = 0; $right < $n; $right++) {
            $num = $nums[$right];
            $current_sum += $num;
            $freq[$num]++;

            while ($freq[$num] > 1) {
                $left_num = $nums[$left];
                $current_sum -= $left_num;
                $freq[$left_num]--;
                $left++;
            }

            if ($current_sum > $max_sum) {
                $max_sum = $current_sum;
            }
        }

        return $max_sum;
    }
}