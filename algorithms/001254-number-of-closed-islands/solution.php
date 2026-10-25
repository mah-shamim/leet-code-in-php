<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function closedIsland(array $grid): int
    {
        $m = count($grid);
        $n = count($grid[0]);

        // Remove all land cells connected to the boundary.
        // They cannot be part of a closed island.
        for ($j = 0; $j < $n; $j++) {
            if ($grid[0][$j] === 0) {
                $this->floodFill($grid, 0, $j);
            }
            if ($grid[$m - 1][$j] === 0) {
                $this->floodFill($grid, $m - 1, $j);
            }
        }

        for ($i = 0; $i < $m; $i++) {
            if ($grid[$i][0] === 0) {
                $this->floodFill($grid, $i, 0);
            }
            if ($grid[$i][$n - 1] === 0) {
                $this->floodFill($grid, $i, $n - 1);
            }
        }

        $closedIslands = 0;

        // Count remaining zero-connected components.
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] === 0) {
                    $closedIslands++;
                    $this->floodFill($grid, $i, $j);
                }
            }
        }

        return $closedIslands;
    }

    /**
     * @param array $grid
     * @param int $row
     * @param int $col
     * @return void
     */
    private function floodFill(array &$grid, int $row, int $col): void {
        $m = count($grid);
        $n = count($grid[0]);

        $directions = [
            [1, 0],
            [-1, 0],
            [0, 1],
            [0, -1],
        ];

        $stack = [[$row, $col]];
        $grid[$row][$col] = 1;

        while (!empty($stack)) {
            [$r, $c] = array_pop($stack);

            foreach ($directions as [$dr, $dc]) {
                $nr = $r + $dr;
                $nc = $c + $dc;

                if (
                    $nr >= 0 && $nr < $m &&
                    $nc >= 0 && $nc < $n &&
                    $grid[$nr][$nc] === 0
                ) {
                    $grid[$nr][$nc] = 1;
                    $stack[] = [$nr, $nc];
                }
            }
        }
    }
}