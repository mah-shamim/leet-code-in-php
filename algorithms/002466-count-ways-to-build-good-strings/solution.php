<?php

class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @param Integer $zero
     * @param Integer $one
     * @return Integer
     */
    function countGoodStrings($low, $high, $zero, $one) {
        $MOD = 1000000007;

        // Initialize dp array with size (high + 1), since we need to calculate lengths from 0 to high
        $dp = array_fill(0, $high + 1, 0);

        // Base case: one way to create a string of length 0 (empty string)
        $dp[0] = 1;

        // Fill dp array using the recurrence relation
        for ($i = 1; $i <= $high; $i++) {
            if ($i - $zero >= 0) {
                $dp[$i] = ($dp[$i] + $dp[$i - $zero]) % $MOD;
            }
            if ($i - $one >= 0) {
                $dp[$i] = ($dp[$i] + $dp[$i - $one]) % $MOD;
            }
        }

        // Calculate the result as the sum of dp[i] for i in the range [low, high]
        $result = 0;
        for ($i = $low; $i <= $high; $i++) {
            $result = ($result + $dp[$i]) % $MOD;
        }

        return $result;
    }
}