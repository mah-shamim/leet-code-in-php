<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function updateMatrix($mat) {
        $rows = count($mat);
        $cols = count($mat[0]);
        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];

        // Initialize distances with a large number for '1' cells
        $distance = array_fill(0, $rows, array_fill(0, $cols, PHP_INT_MAX));
        $queue = [];

        // Add all '0' cells to the queue and set their distance to 0
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($mat[$i][$j] === 0) {
                    $distance[$i][$j] = 0;
                    $queue[] = [$i, $j];
                }
            }
        }

        // BFS from all '0' cells
        while (!empty($queue)) {
            list($currentRow, $currentCol) = array_shift($queue);

            foreach ($directions as $direction) {
                $newRow = $currentRow + $direction[0];
                $newCol = $currentCol + $direction[1];

                // Check if the new cell is within bounds
                if ($newRow >= 0 && $newRow < $rows && $newCol >= 0 && $newCol < $cols) {
                    // If a shorter distance is found, update it and enqueue the cell
                    if ($distance[$newRow][$newCol] > $distance[$currentRow][$currentCol] + 1) {
                        $distance[$newRow][$newCol] = $distance[$currentRow][$currentCol] + 1;
                        $queue[] = [$newRow, $newCol];
                    }
                }
            }
        }

        return $distance;
    }
}