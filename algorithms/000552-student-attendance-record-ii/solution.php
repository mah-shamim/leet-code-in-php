<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function checkRecord($n) {
        $kMod = 1000000007;
        // dp[$i][$j] := the length so far with $i A's and the last letters are $j L's
        $dp = array(array(0, 0, 0), array(0, 0, 0));
        $dp[0][0] = 1;

        while ($n-- > 0) {
            $prev = array_map(function($A) {
                return array_values($A);
            }, $dp);

            // Append a P.
            $dp[0][0] = ($prev[0][0] + $prev[0][1] + $prev[0][2]) % $kMod;

            // Append an L.
            $dp[0][1] = $prev[0][0];

            // Append an L.
            $dp[0][2] = $prev[0][1];

            // Append an A or append a P.
            $dp[1][0] = ($prev[0][0] + $prev[0][1] + $prev[0][2] + $prev[1][0] + $prev[1][1] + $prev[1][2]) % $kMod;

            // Append an L.
            $dp[1][1] = $prev[1][0];

            // Append an L.
            $dp[1][2] = $prev[1][1];
        }

        return (int)(($dp[0][0] + $dp[0][1] + $dp[0][2] + $dp[1][0] + $dp[1][1] + $dp[1][2]) % $kMod);

    }
}