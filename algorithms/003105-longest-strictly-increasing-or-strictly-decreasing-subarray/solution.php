<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestMonotonicSubarray($nums) {
        $n = count($nums);
        if ($n == 0) return 0;

        $maxLen = 1;
        $incLen = 1;
        $decLen = 1;

        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] > $nums[$i - 1]) {
                $incLen++;
                $decLen = 1;
            } elseif ($nums[$i] < $nums[$i - 1]) {
                $decLen++;
                $incLen = 1;
            } else {
                $incLen = 1;
                $decLen = 1;
            }

            if ($incLen > $maxLen) {
                $maxLen = $incLen;
            }
            if ($decLen > $maxLen) {
                $maxLen = $decLen;
            }
        }

        return $maxLen;
    }
}