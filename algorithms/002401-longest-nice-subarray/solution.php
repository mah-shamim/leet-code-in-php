<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestNiceSubarray($nums) {
        $last_occurrence = array_fill(0, 31, -1);
        $left = 0;
        $max_len = 1;
        $n = count($nums);
        for ($right = 0; $right < $n; $right++) {
            $current = $nums[$right];
            for ($i = 0; $i <= 30; $i++) {
                if (($current & (1 << $i)) != 0) {
                    if ($last_occurrence[$i] >= $left) {
                        $left = max($left, $last_occurrence[$i] + 1);
                    }
                }
            }
            for ($i = 0; $i <= 30; $i++) {
                if (($current & (1 << $i)) != 0) {
                    $last_occurrence[$i] = $right;
                }
            }
            $max_len = max($max_len, $right - $left + 1);
        }
        return $max_len;
    }
}