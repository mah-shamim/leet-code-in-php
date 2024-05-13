<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return float|int
     */
    function matrixScore(array $grid): float|int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $ans = $m;  // All the cells in the first column are 1.

        for ($j = 1; $j < $n; ++$j) {
            $onesCount = 0;
            for ($i = 0; $i < $m; ++$i) {
                // The best strategy is flipping the rows with a leading 0.
                $onesCount += $grid[$i][$j] == $grid[$i][0];
            }
            $ans = $ans * 2 + max($onesCount, $m - $onesCount);
        }

        return $ans;
    }
}