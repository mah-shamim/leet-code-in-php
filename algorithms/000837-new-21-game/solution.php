<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @param Integer $maxPts
     * @return Float
     */
    function new21Game($n, $k, $maxPts) {
        if ($k == 0) {
            return 1.0;
        }
        $dp = array_fill(0, $k, 0.0);
        $dp[0] = 1.0;
        $windowSum = 1.0;

        for ($i = 1; $i < $k; $i++) {
            $dp[$i] = $windowSum * (1.0 / $maxPts);
            $windowSum += $dp[$i];
            if ($i >= $maxPts) {
                $windowSum -= $dp[$i - $maxPts];
            }
        }

        $totalProb = 0.0;
        $maxStop = min($n, $k - 1 + $maxPts);
        for ($j = 0; $j < $k; $j++) {
            $lowS = max($k, $j + 1);
            $highS = min($j + $maxPts, $maxStop);
            if ($lowS <= $highS) {
                $count = $highS - $lowS + 1;
                $totalProb += $dp[$j] * $count;
            }
        }
        $totalProb /= $maxPts;

        return $totalProb;
    }
}