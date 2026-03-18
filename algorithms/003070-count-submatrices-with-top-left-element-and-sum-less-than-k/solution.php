<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer
     */
    function countSubmatrices(array $grid, int $k): int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $colPrefix = array_fill(0, $n, 0);
        $count = 0;

        for ($i = 0; $i < $m; $i++) {
            $rowSum = 0;
            for ($j = 0; $j < $n; $j++) {
                $rowSum += $grid[$i][$j];
                $colPrefix[$j] += $rowSum;
                if ($colPrefix[$j] <= $k) {
                    $count++;
                }
            }
        }

        return $count;
    }
}