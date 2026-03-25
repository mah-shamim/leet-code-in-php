<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Boolean
     */
    function canPartitionGrid(array $grid): bool
    {
        $m = count($grid);
        $n = count($grid[0]);
        $total = 0;
        $rowSums = array_fill(0, $m, 0);
        $colSums = array_fill(0, $n, 0);

        // Compute total sum, row sums, and column sums
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $val = $grid[$i][$j];
                $total += $val;
                $rowSums[$i] += $val;
                $colSums[$j] += $val;
            }
        }

        // If total sum is odd, equal split is impossible
        if ($total % 2 != 0) {
            return false;
        }

        $target = $total / 2;

        // Check horizontal cuts (between rows)
        $prefix = 0;
        for ($i = 0; $i < $m - 1; $i++) {
            $prefix += $rowSums[$i];
            if ($prefix == $target) {
                return true;
            }
        }

        // Check vertical cuts (between columns)
        $prefix = 0;
        for ($j = 0; $j < $n - 1; $j++) {
            $prefix += $colSums[$j];
            if ($prefix == $target) {
                return true;
            }
        }

        return false;
    }
}