<?php

class Solution {

    /**
     * @param Integer[][] $coins
     * @return Integer
     */
    function maximumAmount(array $coins): int
    {
        $m = count($coins);
        $n = count($coins[0]);
        $INF = -1000000000;  // sufficiently small number

        // DP arrays for previous row and current row
        $prev0 = array_fill(0, $n, $INF);
        $prev1 = array_fill(0, $n, $INF);
        $prev2 = array_fill(0, $n, $INF);
        $cur0 = array_fill(0, $n, $INF);
        $cur1 = array_fill(0, $n, $INF);
        $cur2 = array_fill(0, $n, $INF);

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $coin = $coins[$i][$j];

                // Starting cell
                if ($i == 0 && $j == 0) {
                    $cur0[$j] = $coin;
                    $cur1[$j] = ($coin < 0) ? 0 : $INF;
                    $cur2[$j] = $INF;
                    continue;
                }

                // k = 0 (no neutralization used yet)
                $best0 = $INF;
                if ($i > 0) {
                    $best0 = max($best0, $prev0[$j] + $coin);
                }
                if ($j > 0) {
                    $best0 = max($best0, $cur0[$j-1] + $coin);
                }
                $cur0[$j] = $best0;

                // k = 1 (exactly one neutralization used so far)
                $best1 = $INF;
                // not neutralizing current cell
                if ($i > 0) {
                    $best1 = max($best1, $prev1[$j] + $coin);
                }
                if ($j > 0) {
                    $best1 = max($best1, $cur1[$j-1] + $coin);
                }
                // neutralizing current cell (only if coin is negative)
                if ($coin < 0) {
                    if ($i > 0) {
                        $best1 = max($best1, $prev0[$j] + 0);
                    }
                    if ($j > 0) {
                        $best1 = max($best1, $cur0[$j-1] + 0);
                    }
                }
                $cur1[$j] = $best1;

                // k = 2 (exactly two neutralizations used so far)
                $best2 = $INF;
                // not neutralizing current cell
                if ($i > 0) {
                    $best2 = max($best2, $prev2[$j] + $coin);
                }
                if ($j > 0) {
                    $best2 = max($best2, $cur2[$j-1] + $coin);
                }
                // neutralizing current cell (only if coin is negative)
                if ($coin < 0) {
                    if ($i > 0) {
                        $best2 = max($best2, $prev1[$j] + 0);
                    }
                    if ($j > 0) {
                        $best2 = max($best2, $cur1[$j-1] + 0);
                    }
                }
                $cur2[$j] = $best2;
            }

            // Move to next row: current row becomes previous row
            $prev0 = $cur0;
            $prev1 = $cur1;
            $prev2 = $cur2;
            // Reset current row arrays for the next iteration
            $cur0 = array_fill(0, $n, $INF);
            $cur1 = array_fill(0, $n, $INF);
            $cur2 = array_fill(0, $n, $INF);
        }

        // Answer is the maximum over the three states at the bottom‑right cell
        return max($prev0[$n-1], $prev1[$n-1], $prev2[$n-1]);
    }
}