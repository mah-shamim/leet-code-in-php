<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function winnerSquareGame(int $n): bool
    {
        // dp[i] = true if the current player can win with i stones
        $dp = array_fill(0, $n + 1, false);

        // Base case: 0 stones means losing position
        $dp[0] = false;

        // Fill DP table from 1 to n
        for ($i = 1; $i <= $n; $i++) {
            // Try all possible square moves
            $j = 1;
            while ($j * $j <= $i) {
                $square = $j * $j;
                // If there's any move that leads to a losing position for opponent
                if (!$dp[$i - $square]) {
                    $dp[$i] = true;
                    break;
                }
                $j++;
            }
        }

        return $dp[$n];
    }
}