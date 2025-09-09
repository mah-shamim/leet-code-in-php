<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $delay
     * @param Integer $forget
     * @return Integer
     */
    function peopleAwareOfSecret($n, $delay, $forget) {
        $mod = 1000000007;
        $dp = array_fill(0, $n + 1, 0);
        $dp[1] = 1;

        for ($i = 2; $i <= $n; $i++) {
            $start = max(1, $i - $forget + 1);
            $end = $i - $delay;
            if ($start <= $end) {
                for ($j = $start; $j <= $end; $j++) {
                    $dp[$i] = ($dp[$i] + $dp[$j]) % $mod;
                }
            }
        }

        $ans = 0;
        $startDay = max(1, $n - $forget + 1);
        for ($i = $startDay; $i <= $n; $i++) {
            $ans = ($ans + $dp[$i]) % $mod;
        }
        return $ans;
    }
}