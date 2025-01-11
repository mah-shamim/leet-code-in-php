<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minDays($grid) {
        $m = count($grid);
        $n = count($grid[0]);

        // Check if the grid is already disconnected
        if ($this->countIslands($grid) != 1) {
            return 0;
        }

        // Check if a single land removal disconnects the grid
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $grid[$i][$j] = 0; // Temporarily convert to water
                    if ($this->countIslands($grid) != 1) {
                        return 1;
                    }
                    $grid[$i][$j] = 1; // Revert back to land
                }
            }
        }

        // Otherwise, it will take 2 days to disconnect the grid
        return 2;
    }

    /**
     * @param $grid
     * @return int
     */
    function countIslands(&$grid) {
        $m = count($grid);
        $n = count($grid[0]);
        $visited = array_fill(0, $m, array_fill(0, $n, false));
        $islandCount = 0;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1 && !$visited[$i][$j]) {
                    $islandCount++;
                    $this->dfs($grid, $i, $j, $visited);
                }
            }
        }

        return $islandCount;
    }

    /**
     * @param $grid
     * @param $i
     * @param $j
     * @param $visited
     * @return void
     */
    function dfs(&$grid, $i, $j, &$visited) {
        $m = count($grid);
        $n = count($grid[0]);
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];

        $visited[$i][$j] = true;

        foreach ($directions as $dir) {
            $ni = $i + $dir[0];
            $nj = $j + $dir[1];

            if ($ni >= 0 && $nj >= 0 && $ni < $m && $nj < $n && $grid[$ni][$nj] == 1 && !$visited[$ni][$nj]) {
                self::dfs($grid, $ni, $nj, $visited);
            }
        }
    }

}