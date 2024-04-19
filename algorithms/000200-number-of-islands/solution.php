<?php

class Solution {
    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands(array $grid): int
    {
        if (empty($grid)) return 0;

        $rows = count($grid);
        $cols = count($grid[0]);
        $numIslands = 0;

        // Iterate through each cell in the grid
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($grid[$i][$j] == '1') {
                    // Found the start of a new island
                    $numIslands++;
                    // Mark the island and all connected land cells as visited
                    $this->dfs($grid, $i, $j);
                }
            }
        }

        return $numIslands;
    }

    // Depth-First Search (DFS) to mark connected land cells as visited
    function dfs(&$grid, $row, $col): void
    {
        $rows = count($grid);
        $cols = count($grid[0]);

        // Base case: Out of bounds or cell is not part of the island
        if ($row < 0 || $col < 0 || $row >= $rows || $col >= $cols || $grid[$row][$col] == '0') {
            return;
        }

        // Mark the current cell as visited
        $grid[$row][$col] = '0';

        // Recursively visit neighboring cells
        $this->dfs($grid, $row + 1, $col); // Down
        $this->dfs($grid, $row - 1, $col); // Up
        $this->dfs($grid, $row, $col + 1); // Right
        $this->dfs($grid, $row, $col - 1); // Left
    }
}
