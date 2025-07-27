<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countHillValley($nums) {
        $arr = [];
        $n = count($nums);
        $arr[] = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] != $nums[$i - 1]) {
                $arr[] = $nums[$i];
            }
        }

        $m = count($arr);
        if ($m < 3) {
            return 0;
        }

        $count = 0;
        for ($i = 1; $i < $m - 1; $i++) {
            if (($arr[$i] > $arr[$i - 1] && $arr[$i] > $arr[$i + 1]) ||
                ($arr[$i] < $arr[$i - 1] && $arr[$i] < $arr[$i + 1])) {
                $count++;
            }
        }
        return $count;
    }
}