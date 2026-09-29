<?php

class Solution {

    /**
     * @param String[][] $grid
     * @return Boolean
     */
    function hasValidPath(array $grid): bool
    {
        $m = count($grid);
        $n = count($grid[0]);

        // A valid parentheses string must have even length.
        if (($m + $n - 1) % 2 !== 0) {
            return false;
        }

        // The path starts with grid[0][0], so it cannot be a closing bracket.
        if ($grid[0][0] === ')') {
            return false;
        }

        // DP stores possible balances for each column.
        $prevRow = array_fill(0, $n, []);
        $currRow = array_fill(0, $n, []);

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i === 0 && $j === 0) {
                    $currRow[0] = [1 => true];
                    continue;
                }

                $delta = $grid[$i][$j] === '(' ? 1 : -1;
                $remaining = ($m - 1 - $i) + ($n - 1 - $j);
                $set = [];

                // Coming from the top cell.
                if ($i > 0) {
                    foreach ($prevRow[$j] as $balance => $_) {
                        $next = $balance + $delta;
                        if ($next >= 0 && $next <= $remaining) {
                            $set[$next] = true;
                        }
                    }
                }

                // Coming from the left cell.
                if ($j > 0) {
                    foreach ($currRow[$j - 1] as $balance => $_) {
                        $next = $balance + $delta;
                        if ($next >= 0 && $next <= $remaining) {
                            $set[$next] = true;
                        }
                    }
                }

                $currRow[$j] = $set;
            }

            $prevRow = $currRow;
        }

        // A valid string must end with balance 0.
        return isset($currRow[$n - 1][0]);
    }
}