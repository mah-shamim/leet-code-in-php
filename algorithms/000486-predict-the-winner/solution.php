<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function predictTheWinner(array $nums): bool
    {
        $n = count($nums);

        // dp[i][j] = maximum score difference player1 can achieve
        // from subarray nums[i..j] with optimal play
        $dp = array_fill(0, $n, array_fill(0, $n, 0));

        // Base case: single element, player1 takes it
        for ($i = 0; $i < $n; $i++) {
            $dp[$i][$i] = $nums[$i];
        }

        // Fill dp for increasing subarray lengths
        for ($len = 2; $len <= $n; $len++) {
            for ($i = 0; $i <= $n - $len; $i++) {
                $j = $i + $len - 1;

                // If player1 takes nums[i], remaining is nums[i+1..j] for player2
                // Player2 will minimize player1's advantage, so we subtract dp[i+1][j]
                $takeLeft = $nums[$i] - $dp[$i + 1][$j];

                // If player1 takes nums[j], remaining is nums[i..j-1] for player2
                $takeRight = $nums[$j] - $dp[$i][$j - 1];

                // Player1 chooses the move that maximizes advantage
                $dp[$i][$j] = max($takeLeft, $takeRight);
            }
        }

        // If player1's advantage is >= 0, they can win or tie
        return $dp[0][$n - 1] >= 0;
    }
}