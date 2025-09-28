<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function largestPerimeter($nums) {
        rsort($nums);
        for ($i = 0; $i < count($nums) - 2; $i++) {
            if ($nums[$i + 1] + $nums[$i + 2] > $nums[$i]) {
                return $nums[$i] + $nums[$i + 1] + $nums[$i + 2];
            }
        }
        return 0;
    }
}