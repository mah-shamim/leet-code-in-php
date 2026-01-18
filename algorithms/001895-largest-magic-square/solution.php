<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function largestMagicSquare(array $grid): int
    {
        $m = count($grid);
        $n = count($grid[0]);

        // Precompute prefix sums for rows and columns
        $rowPrefix = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
        $colPrefix = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $rowPrefix[$i + 1][$j + 1] = $rowPrefix[$i + 1][$j] + $grid[$i][$j];
                $colPrefix[$i + 1][$j + 1] = $colPrefix[$i][$j + 1] + $grid[$i][$j];
            }
        }

        // Helper function to get sum of a row segment
        $getRowSum = function($r, $c1, $c2) use (&$rowPrefix) {
            return $rowPrefix[$r + 1][$c2 + 1] - $rowPrefix[$r + 1][$c1];
        };

        // Helper function to get sum of a column segment
        $getColSum = function($c, $r1, $r2) use (&$colPrefix) {
            return $colPrefix[$r2 + 1][$c + 1] - $colPrefix[$r1][$c + 1];
        };

        // Start from largest possible k down to 2 (1x1 is always magic)
        for ($k = min($m, $n); $k >= 2; $k--) {
            for ($i = 0; $i <= $m - $k; $i++) {
                for ($j = 0; $j <= $n - $k; $j++) {
                    if ($this->isMagicSquare($grid, $i, $j, $k, $getRowSum, $getColSum)) {
                        return $k;
                    }
                }
            }
        }

        return 1; // Every 1x1 grid is a magic square
    }

    /**
     * Check if a k×k subgrid starting at (r,c) is a magic square
     *
     * @param $grid
     * @param $r
     * @param $c
     * @param $k
     * @param $getRowSum
     * @param $getColSum
     * @return bool
     */
    private function isMagicSquare($grid, $r, $c, $k, $getRowSum, $getColSum): bool
    {
        // Calculate the target sum from first row
        $target = $getRowSum($r, $c, $c + $k - 1);

        // Check all rows
        for ($i = 0; $i < $k; $i++) {
            if ($getRowSum($r + $i, $c, $c + $k - 1) != $target) {
                return false;
            }
        }

        // Check all columns
        for ($j = 0; $j < $k; $j++) {
            if ($getColSum($c + $j, $r, $r + $k - 1) != $target) {
                return false;
            }
        }

        // Check main diagonal
        $diag1 = 0;
        for ($d = 0; $d < $k; $d++) {
            $diag1 += $grid[$r + $d][$c + $d];
        }
        if ($diag1 != $target) {
            return false;
        }

        // Check anti-diagonal
        $diag2 = 0;
        for ($d = 0; $d < $k; $d++) {
            $diag2 += $grid[$r + $d][$c + $k - 1 - $d];
        }
        if ($diag2 != $target) {
            return false;
        }

        return true;
    }
}