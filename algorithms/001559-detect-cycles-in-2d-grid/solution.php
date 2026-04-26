<?php

class Solution {

    /**
     * @param String[][] $grid
     * @return Boolean
     */
    function containsCycle(array $grid): bool
    {
        $rows = count($grid);
        $cols = count($grid[0]);
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));

        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        $dfs = function($x, $y, $parentX, $parentY) use (&$dfs, $grid, &$visited, $rows, $cols, $directions) {
            $visited[$x][$y] = true;
            $char = $grid[$x][$y];

            foreach ($directions as $dir) {
                $nx = $x + $dir[0];
                $ny = $y + $dir[1];

                if ($nx >= 0 && $nx < $rows && $ny >= 0 && $ny < $cols && $grid[$nx][$ny] == $char) {
                    // If neighbor is visited and it's not the parent, we have a cycle
                    if ($visited[$nx][$ny]) {
                        if ($nx != $parentX || $ny != $parentY) {
                            return true;
                        }
                    } else {
                        if ($dfs($nx, $ny, $x, $y)) {
                            return true;
                        }
                    }
                }
            }
            return false;
        };

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if (!$visited[$i][$j]) {
                    if ($dfs($i, $j, -1, -1)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}