<?php

class Solution {

    /**
     * @param Integer[] $robot
     * @param Integer[][] $factory
     * @return Integer
     */
    function minimumTotalDistance($robot, $factory) {
        sort($robot);
        usort($factory, function($a, $b) {
            return $a[0] - $b[0];
        });

        $n = count($robot);
        $m = count($factory);
        $dp = array_fill(0, $n + 1, array_fill(0, $m + 1, PHP_INT_MAX));
        $dp[0][0] = 0;

        for ($j = 1; $j <= $m; $j++) {
            $pos = $factory[$j - 1][0];
            $limit = $factory[$j - 1][1];
            for ($i = 0; $i <= $n; $i++) {
                $dp[$i][$j] = $dp[$i][$j - 1];
                $sumDist = 0;
                for ($k = 1; $k <= min($limit, $i); $k++) {
                    $sumDist += abs($robot[$i - $k] - $pos);
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i - $k][$j - 1] + $sumDist);
                }
            }
        }

        return $dp[$n][$m];
    }
}