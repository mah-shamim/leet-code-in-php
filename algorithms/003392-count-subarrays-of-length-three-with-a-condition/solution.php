<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countSubarrays($nums) {
        $count = 0;
        $n = count($nums);
        for ($i = 0; $i <= $n - 3; $i++) {
            $a = $nums[$i];
            $b = $nums[$i + 1];
            $c = $nums[$i + 2];
            if ($b % 2 != 0) {
                continue;
            }
            $half_b = $b / 2;
            if (($a + $c) == $half_b) {
                $count++;
            }
        }
        return $count;
    }
}