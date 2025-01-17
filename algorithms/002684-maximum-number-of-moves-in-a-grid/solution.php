<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxMoves($grid) {
        $m = count($grid);
        $n = count($grid[0]);

        // Initialize DP array with 0 moves for all cells
        $dp = array_fill(0, $m, array_fill(0, $n, 0));

        // Traverse the grid from the second-to-last column to the first
        for ($col = $n - 2; $col >= 0; $col--) {
            for ($row = 0; $row < $m; $row++) {
                // Possible moves (right-up, right, right-down)
                $moves = [
                    [$row - 1, $col + 1],
                    [$row, $col + 1],
                    [$row + 1, $col + 1]
                ];

                foreach ($moves as $move) {
                    list($newRow, $newCol) = $move;
                    if ($newRow >= 0 && $newRow < $m && $grid[$newRow][$newCol] > $grid[$row][$col]) {
                        $dp[$row][$col] = max($dp[$row][$col], $dp[$newRow][$newCol] + 1);
                    }
                }
            }
        }

        // Find the maximum moves starting from any cell in the first column
        $maxMoves = 0;
        for ($row = 0; $row < $m; $row++) {
            $maxMoves = max($maxMoves, $dp[$row][0]);
        }

        return $maxMoves;
    }
}