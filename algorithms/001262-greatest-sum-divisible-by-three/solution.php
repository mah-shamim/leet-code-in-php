<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSumDivThree($nums) {
        $dp = [0, -PHP_INT_MAX, -PHP_INT_MAX];

        foreach ($nums as $num) {
            $r = $num % 3;
            $temp = $dp;
            for ($i = 0; $i < 3; $i++) {
                if ($temp[$i] != -PHP_INT_MAX) {
                    $newRem = ($i + $r) % 3;
                    $dp[$newRem] = max($dp[$newRem], $temp[$i] + $num);
                }
            }
        }

        return $dp[0];
    }
}