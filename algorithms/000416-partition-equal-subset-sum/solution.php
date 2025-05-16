<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        $sum = array_sum($nums);
        if ($sum % 2 != 0) {
            return false;
        }
        $target = $sum / 2;

        $dp = array_fill(0, $target + 1, false);
        $dp[0] = true;

        foreach ($nums as $num) {
            for ($j = $target; $j >= $num; $j--) {
                $dp[$j] = $dp[$j] || $dp[$j - $num];
            }
        }

        return $dp[$target];
    }
}