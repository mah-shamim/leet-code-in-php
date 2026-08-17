<?php

class Solution {

    /**
     * @param Integer[] $stoneValue
     * @return Integer
     */
    function stoneGameV(array $stoneValue): int
    {
        $n = count($stoneValue);

        // Prefix sums for O(1) range sum queries
        $prefix = array_fill(0, $n + 1, 0);
        for ($i = 0; $i < $n; $i++) {
            $prefix[$i + 1] = $prefix[$i] + $stoneValue[$i];
        }

        // dp[i][j] = max score Alice can get from subarray stoneValue[i..j]
        $dp = array_fill(0, $n, array_fill(0, $n, 0));

        // Length from 2 to n
        for ($len = 2; $len <= $n; $len++) {
            for ($i = 0; $i + $len - 1 < $n; $i++) {
                $j = $i + $len - 1;
                $best = 0;
                // Try all possible split points k
                for ($k = $i; $k < $j; $k++) {
                    $leftSum = $prefix[$k + 1] - $prefix[$i];
                    $rightSum = $prefix[$j + 1] - $prefix[$k + 1];

                    if ($leftSum < $rightSum) {
                        $best = max($best, $leftSum + $dp[$i][$k]);
                    } else if ($leftSum > $rightSum) {
                        $best = max($best, $rightSum + $dp[$k + 1][$j]);
                    } else { // equal
                        $best = max($best, $leftSum + max($dp[$i][$k], $dp[$k + 1][$j]));
                    }
                }
                $dp[$i][$j] = $best;
            }
        }

        return $dp[0][$n - 1];
    }
}