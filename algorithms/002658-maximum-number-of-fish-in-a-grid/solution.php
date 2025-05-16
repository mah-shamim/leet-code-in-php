<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function findMaxFish($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));

        $directions = [
            [-1, 0], // up
            [1, 0],  // down
            [0, -1], // left
            [0, 1]   // right
        ];

        $maxFish = 0;

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($grid[$i][$j] > 0 && !$visited[$i][$j]) {
                    $maxFish = max($maxFish, $this->dfs($i, $j, $grid, $visited, $rows, $cols, $directions));
                }
            }
        }

        return $maxFish;
    }

    /**
     * Helper function for DFS
     * @param $r
     * @param $c
     * @param $grid
     * @param $visited
     * @param $rows
     * @param $cols
     * @param $directions
     * @return array|bool|int|int[]|mixed|null
     */
    function dfs($r, $c, &$grid, &$visited, $rows, $cols, $directions) {
        if ($r < 0 || $c < 0 || $r >= $rows || $c >= $cols || $grid[$r][$c] == 0 || $visited[$r][$c]) {
            return 0;
        }

        $visited[$r][$c] = true;
        $fishCount = $grid[$r][$c];

        foreach ($directions as $dir) {
            $fishCount += $this->dfs($r + $dir[0], $c + $dir[1], $grid, $visited, $rows, $cols, $directions);
        }

        return $fishCount;
    }
}