<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter(array $grid): float|int
    {
        $m = count($grid);
        $n = count($grid[0]);

        $islands = 0;
        $neighbors = 0;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $islands += 1;
                    if ($i + 1 < $m && $grid[$i + 1][$j] == 1) {
                        $neighbors += 1;
                    }
                    if ($j + 1 < $n && $grid[$i][$j + 1] == 1) {
                        $neighbors += 1;
                    }
                }
            }
        }

        return $islands * 4 - $neighbors * 2;
    }
}