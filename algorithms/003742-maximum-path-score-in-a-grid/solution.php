<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer
     */
    function maxPathScore(array $grid, int $k): int
    {
        $m = count($grid);
        $n = count($grid[0]);

        // DP array: dp[i][j][c] would be too large
        // Instead, we use a 2D array where each cell stores an array of max scores for each cost
        // And we'll use two rows at a time to save memory

        // dp[j][c] represents max score at row i, column j with cost exactly c
        // We'll use two rows: current and previous
        $prev = array_fill(0, $n, array_fill(0, $k + 1, -1));

        // Initialize starting point
        $startCost = $grid[0][0] > 0 ? 1 : 0;
        $startScore = $grid[0][0];
        if ($startCost <= $k) {
            $prev[0][$startCost] = $startScore;
        }

        // Fill first row
        for ($j = 1; $j < $n; $j++) {
            $cost = $grid[0][$j] > 0 ? 1 : 0;
            $score = $grid[0][$j];

            for ($c = 0; $c <= $k; $c++) {
                if ($prev[$j - 1][$c] != -1) {
                    $newCost = $c + $cost;
                    if ($newCost <= $k) {
                        $prev[$j][$newCost] = max($prev[$j][$newCost], $prev[$j - 1][$c] + $score);
                    }
                }
            }
        }

        // Fill remaining rows
        for ($i = 1; $i < $m; $i++) {
            $curr = array_fill(0, $n, array_fill(0, $k + 1, -1));

            // First column of current row
            $cost = $grid[$i][0] > 0 ? 1 : 0;
            $score = $grid[$i][0];

            for ($c = 0; $c <= $k; $c++) {
                if ($prev[0][$c] != -1) {
                    $newCost = $c + $cost;
                    if ($newCost <= $k) {
                        $curr[0][$newCost] = max($curr[0][$newCost], $prev[0][$c] + $score);
                    }
                }
            }

            // Remaining columns of current row
            for ($j = 1; $j < $n; $j++) {
                $cost = $grid[$i][$j] > 0 ? 1 : 0;
                $score = $grid[$i][$j];

                for ($c = 0; $c <= $k; $c++) {
                    // From top
                    if ($prev[$j][$c] != -1) {
                        $newCost = $c + $cost;
                        if ($newCost <= $k) {
                            $curr[$j][$newCost] = max($curr[$j][$newCost], $prev[$j][$c] + $score);
                        }
                    }

                    // From left
                    if ($curr[$j - 1][$c] != -1) {
                        $newCost = $c + $cost;
                        if ($newCost <= $k) {
                            $curr[$j][$newCost] = max($curr[$j][$newCost], $curr[$j - 1][$c] + $score);
                        }
                    }
                }
            }

            $prev = $curr;
        }

        // Find maximum score at destination with cost <= k
        $ans = -1;
        for ($c = 0; $c <= $k; $c++) {
            if ($prev[$n - 1][$c] > $ans) {
                $ans = $prev[$n - 1][$c];
            }
        }

        return $ans;
    }
}