<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @param Integer $k
     * @return Integer
     */
    function maximumProfit($prices, $k) {
        $n = count($prices);

        // dp[state][t] = max profit with state and t transactions completed
        $dp = array_fill(0, 3, array_fill(0, $k + 1, PHP_INT_MIN));
        $dp[0][0] = 0;

        for ($i = 0; $i < $n; $i++) {
            $newDp = $dp;

            for ($t = 0; $t <= $k; $t++) {
                // From state 0
                if ($dp[0][$t] > PHP_INT_MIN) {
                    // Start long
                    $newDp[1][$t] = max($newDp[1][$t], $dp[0][$t] - $prices[$i]);
                    // Start short
                    $newDp[2][$t] = max($newDp[2][$t], $dp[0][$t] + $prices[$i]);
                }

                // From state 1
                if ($dp[1][$t] > PHP_INT_MIN) {
                    // Complete long
                    if ($t < $k) {
                        $newDp[0][$t + 1] = max($newDp[0][$t + 1], $dp[1][$t] + $prices[$i]);
                    }
                }

                // From state 2
                if ($dp[2][$t] > PHP_INT_MIN) {
                    // Complete short
                    if ($t < $k) {
                        $newDp[0][$t + 1] = max($newDp[0][$t + 1], $dp[2][$t] - $prices[$i]);
                    }
                }
            }

            $dp = $newDp;
        }

        $maxProfit = 0;
        for ($t = 0; $t <= $k; $t++) {
            $maxProfit = max($maxProfit, $dp[0][$t]);
        }

        return $maxProfit;
    }
}