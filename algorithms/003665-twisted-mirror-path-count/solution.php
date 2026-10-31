<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function uniquePaths(array $grid): int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $total = $m * $n;
        $MOD = 1000000007;

        // rightEnter[idx] = final landing cell if entering mirror at idx while moving right
        // downEnter[idx]  = final landing cell if entering mirror at idx while moving down
        // -1 means invalid / out of bounds
        $rightEnter = array_fill(0, $total, -1);
        $downEnter = array_fill(0, $total, -1);

        // Precompute mirror landing positions from bottom-right to top-left
        for ($i = $m - 1; $i >= 0; $i--) {
            for ($j = $n - 1; $j >= 0; $j--) {
                if ($grid[$i][$j] !== 1) {
                    continue;
                }

                $idx = $i * $n + $j;

                // Enter this mirror while moving right -> move down below it
                if ($i + 1 < $m) {
                    $nextIdx = ($i + 1) * $n + $j;
                    if ($grid[$i + 1][$j] === 0) {
                        $rightEnter[$idx] = $nextIdx;
                    } else {
                        $rightEnter[$idx] = $downEnter[$nextIdx];
                    }
                }

                // Enter this mirror while moving down -> move right of it
                if ($j + 1 < $n) {
                    $nextIdx = $i * $n + ($j + 1);
                    if ($grid[$i][$j + 1] === 0) {
                        $downEnter[$idx] = $nextIdx;
                    } else {
                        $downEnter[$idx] = $rightEnter[$nextIdx];
                    }
                }
            }
        }

        $dp = array_fill(0, $total, 0);
        $dp[0] = 1;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $idx = $i * $n + $j;
                $ways = $dp[$idx];

                if ($ways === 0 || $grid[$i][$j] === 1) {
                    continue;
                }

                // Try moving right
                if ($j + 1 < $n) {
                    $nextIdx = $idx + 1;

                    if ($grid[$i][$j + 1] === 0) {
                        $target = $nextIdx;
                    } else {
                        $target = $rightEnter[$nextIdx];
                    }

                    if ($target !== -1) {
                        $dp[$target] += $ways;
                        if ($dp[$target] >= $MOD) {
                            $dp[$target] -= $MOD;
                        }
                    }
                }

                // Try moving down
                if ($i + 1 < $m) {
                    $nextIdx = $idx + $n;

                    if ($grid[$i + 1][$j] === 0) {
                        $target = $nextIdx;
                    } else {
                        $target = $downEnter[$nextIdx];
                    }

                    if ($target !== -1) {
                        $dp[$target] += $ways;
                        if ($dp[$target] >= $MOD) {
                            $dp[$target] -= $MOD;
                        }
                    }
                }
            }
        }

        return $dp[$total - 1] % $MOD;
    }
}