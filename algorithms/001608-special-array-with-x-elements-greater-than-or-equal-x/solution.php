<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function specialArray($nums) {
        sort($nums);
        $n = count($nums);
        if ($nums[0] >= $n) {
            return $n;
        }
        for ($x = 1; $x < $n; $x++) {
            if ($nums[$n - $x] >= $x && $nums[$n - $x - 1] < $x) {
                return $x;
            }
        }
        return -1;
    }
}