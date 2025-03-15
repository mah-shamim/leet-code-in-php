<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minCapability($nums, $k) {
        $left = min($nums);
        $right = max($nums);
        $ans = $right;

        while ($left <= $right) {
            $mid = (int)(($left + $right) / 2);
            if ($this->isPossible($mid, $nums, $k)) {
                $ans = $mid;
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return $ans;
    }

    /**
     * @param $mid
     * @param $nums
     * @param $k
     * @return bool
     */
    function isPossible($mid, $nums, $k) {
        $count = 0;
        $prev = -2;  // Initialize to an index that allows the first house (0) to be considered

        foreach ($nums as $i => $num) {
            if ($num <= $mid && $i > $prev + 1) {
                $count++;
                $prev = $i;
                if ($count >= $k) {
                    return true;
                }
            }
        }

        return $count >= $k;
    }
}