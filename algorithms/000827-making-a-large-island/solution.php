<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function largestIsland($grid) {
        $n = count($grid);
        $islandId = 2; // Start assigning island IDs from 2
        $islandSizes = array(); // To store the size of each island

        // Step 1: Identify islands and calculate their sizes
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $size = 0;
                    $this->dfs($grid, $i, $j, $islandId, $size);
                    $islandSizes[$islandId] = $size;
                    $islandId++;
                }
            }
        }

        // Step 2: Find the best 0 to flip
        $maxSize = 0;
        foreach ($islandSizes as $size) {
            $maxSize = max($maxSize, $size);
        }

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 0) {
                    $neighbors = array();
                    $potentialSize = 1;

                    // Check all four directions
                    if ($i > 0 && $grid[$i-1][$j] > 1) {
                        $neighbors[$grid[$i-1][$j]] = true;
                    }
                    if ($i < $n-1 && $grid[$i+1][$j] > 1) {
                        $neighbors[$grid[$i+1][$j]] = true;
                    }
                    if ($j > 0 && $grid[$i][$j-1] > 1) {
                        $neighbors[$grid[$i][$j-1]] = true;
                    }
                    if ($j < $n-1 && $grid[$i][$j+1] > 1) {
                        $neighbors[$grid[$i][$j+1]] = true;
                    }

                    foreach ($neighbors as $id => $val) {
                        $potentialSize += $islandSizes[$id];
                    }

                    $maxSize = max($maxSize, $potentialSize);
                }
            }
        }

        return $maxSize;
    }

    /**
     * Helper function to perform DFS and calculate component size
     *
     * @param $grid
     * @param $i
     * @param $j
     * @param $islandId
     * @param $size
     * @return void
     */
    function dfs(&$grid, $i, $j, $islandId, &$size) {
        $n = count($grid);
        if ($i < 0 || $i >= $n || $j < 0 || $j >= $n || $grid[$i][$j] != 1) {
            return;
        }

        $grid[$i][$j] = $islandId;
        $size++;

        // Explore all four directions
        $this->dfs($grid, $i-1, $j, $islandId, $size);
        $this->dfs($grid, $i+1, $j, $islandId, $size);
        $this->dfs($grid, $i, $j-1, $islandId, $size);
        $this->dfs($grid, $i, $j+1, $islandId, $size);
    }
}