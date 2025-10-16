<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $value
     * @return Integer
     */
    function findSmallestInteger($nums, $value) {
        $freq = array_fill(0, $value, 0);
        foreach ($nums as $num) {
            $r = $num % $value;
            if ($r < 0) {
                $r += $value;
            }
            $freq[$r]++;
        }

        $mex = PHP_INT_MAX;
        for ($r = 0; $r < $value; $r++) {
            $candidate = $r + $freq[$r] * $value;
            if ($candidate < $mex) {
                $mex = $candidate;
            }
        }
        return $mex;
    }
}