<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $p
     * @return Integer
     */
    function minimizeMax($nums, $p) {
        if ($p == 0) {
            return 0;
        }
        sort($nums);
        $n = count($nums);
        $low = 0;
        $high = $nums[$n - 1] - $nums[0];

        while ($low < $high) {
            $mid = $low + intval(($high - $low) / 2);
            if ($this->canFormPairs($nums, $mid, $p)) {
                $high = $mid;
            } else {
                $low = $mid + 1;
            }
        }
        return $low;
    }

    /**
     * @param $nums
     * @param $mid
     * @param $p
     * @return bool
     */
    function canFormPairs($nums, $mid, $p) {
        $count = 0;
        $i = 0;
        $n = count($nums);
        while ($i < $n - 1) {
            if ($nums[$i + 1] - $nums[$i] <= $mid) {
                $count++;
                $i += 2;
                if ($count >= $p) {
                    return true;
                }
            } else {
                $i++;
            }
        }
        return $count >= $p;
    }
}