<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $x
     * @return Integer
     */
    function numberOfWays($n, $x) {
        $mod = 1000000007;
        $dp = array_fill(0, $n + 1, 0);
        $dp[0] = 1;

        $max_i = 1;
        while (pow($max_i, $x) <= $n) {
            $max_i++;
        }
        $max_i--;

        for ($i = 1; $i <= $max_i; $i++) {
            $v = (int)pow($i, $x);
            for ($j = $n; $j >= $v; $j--) {
                $dp[$j] = ($dp[$j] + $dp[$j - $v]) % $mod;
            }
        }

        return $dp[$n] % $mod;
    }
}