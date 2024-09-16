<?php

class Solution {

    /**
     * @param Integer $rows
     * @param Integer $cols
     * @param Integer $rStart
     * @param Integer $cStart
     * @return Integer[][]
     */
    function spiralMatrixIII($rows, $cols, $rStart, $cStart) {
        // Initialize directions: right, down, left, up
        $directions = [[0,1], [1,0], [0,-1], [-1,0]];
        $result = [];

        // Initial position
        $r = $rStart;
        $c = $cStart;

        // Initial steps for each direction
        $stepCount = 1;
        $totalSteps = 0;

        // The number of positions to cover
        $totalPositions = $rows * $cols;

        // Add the starting position
        $result[] = [$r, $c];
        $totalSteps++;

        while ($totalSteps < $totalPositions) {
            for ($i = 0; $i < 4; $i++) {
                // Moving direction: east -> south -> west -> north
                for ($j = 0; $j < $stepCount; $j++) {
                    $r += $directions[$i][0];
                    $c += $directions[$i][1];

                    // Check if within the bounds of the grid
                    if ($r >= 0 && $r < $rows && $c >= 0 && $c < $cols) {
                        $result[] = [$r, $c];
                        $totalSteps++;
                        if ($totalSteps == $totalPositions) {
                            return $result;
                        }
                    }
                }

                // Increase steps after every two directions (right and down; left and up)
                if ($i == 1 || $i == 3) {
                    $stepCount++;
                }
            }
        }

        return $result;

    }
}