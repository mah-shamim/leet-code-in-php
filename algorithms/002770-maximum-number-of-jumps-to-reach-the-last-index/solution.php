<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function maximumJumps(array $nums, int $target): int
    {
        $n = count($nums);
        $dp = array_fill(0, $n, PHP_INT_MIN);
        $dp[0] = 0;

        for ($j = 1; $j < $n; $j++) {
            for ($i = 0; $i < $j; $i++) {
                $diff = $nums[$j] - $nums[$i];
                if ($diff >= -$target && $diff <= $target) {
                    if ($dp[$i] != PHP_INT_MIN) {
                        $dp[$j] = max($dp[$j], $dp[$i] + 1);
                    }
                }
            }
        }

        return $dp[$n - 1] >= 0 ? $dp[$n - 1] : -1;
    }
}