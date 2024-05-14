<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function getMaximumGold($grid) {
        $m = count($grid);
        $n = count($grid[0]);

        $dfs = function ($i, $j) use (&$dfs, $m, $n, &$grid) {
            if ($i < 0 || $i >= $m || $j < 0 || $j >= $n || !$grid[$i][$j]) {
                return 0;
            }
            $v = $grid[$i][$j];
            $grid[$i][$j] = 0;
            $ans = $v + max([$dfs($i - 1, $j), $dfs($i + 1, $j), $dfs($i, $j - 1), $dfs($i, $j + 1)]);
            $grid[$i][$j] = $v;
            return $ans;
        };

        $ans = 0;
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $ans = max($ans, $dfs($i, $j));
            }
        }

        return $ans;
    }
}