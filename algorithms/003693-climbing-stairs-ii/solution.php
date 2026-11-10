<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $costs
     * @return Integer
     */
    function climbStairs(int $n, array $costs): int
    {
        // dp[j] = minimum cost to reach step j
        $dp = array_fill(0, $n + 1, 0);
        $dp[0] = 0;

        for ($j = 1; $j <= $n; $j++) {
            $best = PHP_INT_MAX;
            $start = max(0, $j - 3);
            $stepCost = $costs[$j - 1]; // costs is 1-indexed

            for ($i = $start; $i < $j; $i++) {
                $distance = $j - $i;
                $candidate = $dp[$i] + $stepCost + $distance * $distance;
                if ($candidate < $best) {
                    $best = $candidate;
                }
            }

            $dp[$j] = $best;
        }

        return $dp[$n];
    }
}