<?php

class Solution {

    /**
     * @param String[] $strs
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function findMaxForm($strs, $m, $n) {
        // Initialize DP table
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        foreach ($strs as $str) {
            // Count zeros and ones in current string
            $zeros = substr_count($str, '0');
            $ones = strlen($str) - $zeros;

            // Update DP table from bottom-right to avoid reusing same string
            for ($i = $m; $i >= $zeros; $i--) {
                for ($j = $n; $j >= $ones; $j--) {
                    $dp[$i][$j] = max($dp[$i][$j], $dp[$i - $zeros][$j - $ones] + 1);
                }
            }
        }

        return $dp[$m][$n];
    }
}