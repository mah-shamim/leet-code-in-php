<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer[][]
     */
    function shiftGrid(array $grid, int $k): array
    {
        $m = count($grid);
        $n = count($grid[0]);
        $total = $m * $n;

        // Step 1: Flatten the grid into a 1D array
        $flat = [];
        foreach ($grid as $row) {
            foreach ($row as $val) {
                $flat[] = $val;
            }
        }

        // Step 2: Effective shifts
        $k = $k % $total;
        if ($k == 0) {
            return $grid; // No change needed
        }

        // Step 3: Rotate array: move last $k elements to front
        $rotated = array_merge(
            array_slice($flat, -$k),
            array_slice($flat, 0, $total - $k)
        );

        // Step 4: Convert back to 2D grid
        $result = [];
        $index = 0;
        for ($i = 0; $i < $m; $i++) {
            $row = [];
            for ($j = 0; $j < $n; $j++) {
                $row[] = $rotated[$index++];
            }
            $result[] = $row;
        }

        return $result;
    }
}