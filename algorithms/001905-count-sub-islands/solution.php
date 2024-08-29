<?php

class Solution {

    /**
     * @param Integer[][] $grid1
     * @param Integer[][] $grid2
     * @return Integer
     */
    function countSubIslands($grid1, $grid2) {
        $m = count($grid1);
        $n = count($grid1[0]);
        $count = 0;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid2[$i][$j] == 1 && $this->dfs($grid1, $grid2, $i, $j, $m, $n)) {
                    $count++;
                }
            }
        }

        return $count;
    }

    /**
     * @param $grid1
     * @param $grid2
     * @param $i
     * @param $j
     * @param $m
     * @param $n
     * @return int|true
     */
    function dfs(&$grid1, &$grid2, $i, $j, $m, $n) {
        if ($i < 0 || $j < 0 || $i >= $m || $j >= $n || $grid2[$i][$j] == 0) {
            return true;
        }

        $grid2[$i][$j] = 0; // Mark the cell as visited in grid2
        $isSubIsland = $grid1[$i][$j] == 1; // Check if it's a sub-island

        // Explore all 4 directions
        $isSubIsland &= self::dfs($grid1, $grid2, $i + 1, $j, $m, $n);
        $isSubIsland &= self::dfs($grid1, $grid2, $i - 1, $j, $m, $n);
        $isSubIsland &= self::dfs($grid1, $grid2, $i, $j + 1, $m, $n);
        $isSubIsland &= self::dfs($grid1, $grid2, $i, $j - 1, $m, $n);

        return $isSubIsland;
    }

}