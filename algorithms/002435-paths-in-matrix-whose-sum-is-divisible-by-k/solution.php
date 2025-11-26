<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer
     */
    function numberOfPaths($grid, $k) {
        $MOD = 1000000007;
        $m = count($grid);
        $n = count($grid[0]);

        // 3D DP: dp[i][j][r] = paths to (i,j) with remainder r
        $dp = array_fill(0, $m, array_fill(0, $n, array_fill(0, $k, 0)));

        // Initialize starting cell
        $firstRem = $grid[0][0] % $k;
        $dp[0][0][$firstRem] = 1;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $currentVal = $grid[$i][$j] % $k;

                // Skip reprocessing the start cell
                if ($i == 0 && $j == 0) continue;

                // Check paths from top
                if ($i > 0) {
                    for ($r = 0; $r < $k; $r++) {
                        if ($dp[$i-1][$j][$r] > 0) {
                            $newRem = ($r + $currentVal) % $k;
                            $dp[$i][$j][$newRem] = ($dp[$i][$j][$newRem] + $dp[$i-1][$j][$r]) % $MOD;
                        }
                    }
                }

                // Check paths from left
                if ($j > 0) {
                    for ($r = 0; $r < $k; $r++) {
                        if ($dp[$i][$j-1][$r] > 0) {
                            $newRem = ($r + $currentVal) % $k;
                            $dp[$i][$j][$newRem] = ($dp[$i][$j][$newRem] + $dp[$i][$j-1][$r]) % $MOD;
                        }
                    }
                }
            }
        }

        return $dp[$m-1][$n-1][0];
    }
}