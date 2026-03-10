<?php

class Solution {

    /**
     * @param Integer $zero
     * @param Integer $one
     * @param Integer $limit
     * @return Integer
     */
    function numberOfStableArrays(int $zero, int $one, int $limit): int
    {
        $MOD = 1000000007;

        // dp0[i][j] : number of sequences with i zeros, j ones ending with 0
        // dp1[i][j] : same but ending with 1
        $dp0 = array_fill(0, $zero + 1, array_fill(0, $one + 1, 0));
        $dp1 = array_fill(0, $zero + 1, array_fill(0, $one + 1, 0));

        // running sum for each j of dp1 over the last 'limit' indices of i
        $sum1 = array_fill(0, $one + 1, 0);

        for ($i = 0; $i <= $zero; $i++) {
            // ----- compute dp0[i][*] -----
            for ($j = 0; $j <= $one; $j++) {
                // base case: a single run of zeros (only when no ones)
                $base0 = ($i > 0 && $i <= $limit && $j == 0) ? 1 : 0;
                $dp0[$i][$j] = ($base0 + $sum1[$j]) % $MOD;
            }

            // ----- prefix sums of dp0[i][*] for fast range queries -----
            $pref0 = array_fill(0, $one + 1, 0);
            $pref0[0] = $dp0[$i][0];
            for ($j = 1; $j <= $one; $j++) {
                $pref0[$j] = ($pref0[$j - 1] + $dp0[$i][$j]) % $MOD;
            }

            // ----- compute dp1[i][*] -----
            for ($j = 0; $j <= $one; $j++) {
                // base case: a single run of ones (only when no zeros)
                $base1 = ($i == 0 && $j > 0 && $j <= $limit) ? 1 : 0;
                if ($j == 0) {
                    $sum0 = 0;
                } else {
                    $left = max(0, $j - $limit);
                    $right = $j - 1;
                    $sum0 = $pref0[$right] - ($left > 0 ? $pref0[$left - 1] : 0);
                    $sum0 = ($sum0 + $MOD) % $MOD;
                }
                $dp1[$i][$j] = ($base1 + $sum0) % $MOD;
            }

            // ----- update running sum $sum1 for the next i -----
            for ($j = 0; $j <= $one; $j++) {
                $sum1[$j] = ($sum1[$j] + $dp1[$i][$j]) % $MOD;
                if ($i >= $limit) {
                    $sum1[$j] = ($sum1[$j] - $dp1[$i - $limit][$j] + $MOD) % $MOD;
                }
            }
        }

        return ($dp0[$zero][$one] + $dp1[$zero][$one]) % $MOD;
    }
}