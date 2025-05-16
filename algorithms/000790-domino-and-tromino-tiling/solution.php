<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTilings($n) {
        $mod = 1000000007;
        if ($n == 0) return 1;
        if ($n == 1) return 1;
        if ($n == 2) return 2;

        $dp = array_fill(0, $n + 1, 0);
        $dp[0] = 1;
        $dp[1] = 1;
        $dp[2] = 2;

        for ($i = 3; $i <= $n; $i++) {
            $dp[$i] = (2 * $dp[$i - 1] + $dp[$i - 3]) % $mod;
        }

        return $dp[$n];
    }
}