<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer
     */
    function minCost(array $grid, int $k): int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $INF = 1000000000;

        // dp[t][i][j] = minimum cost to reach (i,j) using exactly t teleports
        $dp = array_fill(0, $k + 1, array_fill(0, $m, array_fill(0, $n, $INF)));

        // Base case: no teleports
        $dp[0][0][0] = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == 0 && $j == 0) continue;
                $cost = $INF;
                if ($i > 0) $cost = min($cost, $dp[0][$i - 1][$j] + $grid[$i][$j]);
                if ($j > 0) $cost = min($cost, $dp[0][$i][$j - 1] + $grid[$i][$j]);
                $dp[0][$i][$j] = $cost;
            }
        }

        // Find maximum value in the grid
        $maxVal = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] > $maxVal) $maxVal = $grid[$i][$j];
            }
        }

        // Compute for t = 1..k
        for ($t = 1; $t <= $k; $t++) {
            // Step 1: for each value v, find the minimum dp[t-1][i][j] among cells with value v
            $minDpAtValue = array_fill(0, $maxVal + 1, $INF);
            for ($i = 0; $i < $m; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    $v = $grid[$i][$j];
                    $minDpAtValue[$v] = min($minDpAtValue[$v], $dp[$t - 1][$i][$j]);
                }
            }

            // Step 2: compute for each v the minimum over values >= v
            $bestDpForValue = array_fill(0, $maxVal + 1, $INF);
            $currentMin = $INF;
            for ($v = $maxVal; $v >= 0; $v--) {
                $currentMin = min($currentMin, $minDpAtValue[$v]);
                $bestDpForValue[$v] = $currentMin;
            }

            // Step 3: compute dp[t] using normal moves and teleport
            for ($i = 0; $i < $m; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    // Normal moves (right/down)
                    $costNormal = $INF;
                    if ($i > 0) $costNormal = min($costNormal, $dp[$t][$i - 1][$j] + $grid[$i][$j]);
                    if ($j > 0) $costNormal = min($costNormal, $dp[$t][$i][$j - 1] + $grid[$i][$j]);

                    // Teleport from any cell with value >= grid[i][j]
                    $costTeleport = $bestDpForValue[$grid[$i][$j]];

                    $dp[$t][$i][$j] = min($costNormal, $costTeleport);
                }
            }
        }

        // Answer is the minimum over all t (0..k)
        $ans = $INF;
        for ($t = 0; $t <= $k; $t++) {
            $ans = min($ans, $dp[$t][$m - 1][$n - 1]);
        }
        return $ans;
    }
}