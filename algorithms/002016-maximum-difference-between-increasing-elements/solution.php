<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumDifference($nums) {
        $n = count($nums);
        $min_so_far = $nums[0];
        $max_diff = -1;

        for ($j = 1; $j < $n; $j++) {
            if ($nums[$j] > $min_so_far) {
                $diff = $nums[$j] - $min_so_far;
                if ($diff > $max_diff) {
                    $max_diff = $diff;
                }
            }
            if ($nums[$j] < $min_so_far) {
                $min_so_far = $nums[$j];
            }
        }

        return $max_diff;
    }
}