<?php

class Solution {

    /**
     * @param Integer[] $piles
     * @return Boolean
     */
    function stoneGame(array $piles): bool
    {
        $n = count($piles);
        // dp[i][j] represents the maximum stones the current player can get
        // from piles[i...j] compared to the opponent
        $dp = array_fill(0, $n, array_fill(0, $n, 0));

        // For single pile, the player can take it all
        for ($i = 0; $i < $n; $i++) {
            $dp[$i][$i] = $piles[$i];
        }

        // Fill dp for all intervals
        for ($length = 2; $length <= $n; $length++) {
            for ($i = 0; $i <= $n - $length; $i++) {
                $j = $i + $length - 1;
                // Current player can take either the leftmost or rightmost pile
                // Then the opponent becomes the current player for the remaining interval
                $dp[$i][$j] = max(
                    $piles[$i] - $dp[$i + 1][$j],
                    $piles[$j] - $dp[$i][$j - 1]
                );
            }
        }

        // If dp[0][n-1] > 0, Alice gets more stones than Bob
        return $dp[0][$n - 1] > 0;
    }
}