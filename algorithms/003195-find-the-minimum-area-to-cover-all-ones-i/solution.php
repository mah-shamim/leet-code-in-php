<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumArea($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);

        $minRow = $rows;
        $maxRow = -1;
        $minCol = $cols;
        $maxCol = -1;

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($grid[$i][$j] == 1) {
                    if ($i < $minRow) {
                        $minRow = $i;
                    }
                    if ($i > $maxRow) {
                        $maxRow = $i;
                    }
                    if ($j < $minCol) {
                        $minCol = $j;
                    }
                    if ($j > $maxCol) {
                        $maxCol = $j;
                    }
                }
            }
        }

        $height = $maxRow - $minRow + 1;
        $width = $maxCol - $minCol + 1;

        return $height * $width;
    }
}