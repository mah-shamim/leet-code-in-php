<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxSubarraySum($nums, $k) {
        $ans = PHP_INT_MIN;
        $prefix = 0;

        // minPrefix[i % k] := the minimum prefix sum at position i % k
        $minPrefix = array_fill(0, $k, PHP_INT_MAX / 2);
        $minPrefix[($k - 1) % $k] = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $prefix += $nums[$i];
            $mod = $i % $k;
            $ans = max($ans, $prefix - $minPrefix[$mod]);
            $minPrefix[$mod] = min($minPrefix[$mod], $prefix);
        }

        return $ans;
    }
}