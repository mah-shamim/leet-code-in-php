<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $perimeter = 0;

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($grid[$i][$j] == 1) {
                    // Add 4 for the current land cell
                    $perimeter += 4;

                    // Check if the cell has a right neighbor that's also land
                    if ($j < $cols - 1 && $grid[$i][$j + 1] == 1) {
                        $perimeter -= 2; // Subtract 2 for the shared edge with the right neighbor
                    }

                    // Check if the cell has a bottom neighbor that's also land
                    if ($i < $rows - 1 && $grid[$i + 1][$j] == 1) {
                        $perimeter -= 2; // Subtract 2 for the shared edge with the bottom neighbor
                    }
                }
            }
        }

        return $perimeter;

    }
}