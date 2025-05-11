<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countCompleteSubarrays($nums) {
        $unique = array_unique($nums);
        $k = count($unique);
        if ($k == 0) {
            return 0;
        }
        return $this->atMost($nums, $k) - $this->atMost($nums, $k - 1);
    }

    /**
     * @param $nums
     * @param $m
     * @return int
     */
    function atMost($nums, $m) {
        $count = array();
        $left = 0;
        $res = 0;
        $distinct = 0;
        $n = count($nums);
        for ($right = 0; $right < $n; $right++) {
            $num = $nums[$right];
            if (!isset($count[$num]) || $count[$num] == 0) {
                $distinct++;
                $count[$num] = 0;
            }
            $count[$num]++;
            while ($distinct > $m) {
                $leftNum = $nums[$left];
                $count[$leftNum]--;
                if ($count[$leftNum] == 0) {
                    $distinct--;
                }
                $left++;
            }
            $res += $right - $left + 1;
        }
        return $res;
    }
}