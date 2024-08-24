<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function numMagicSquaresInside($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $count = 0;

        for ($i = 0; $i <= $rows - 3; $i++) {
            for ($j = 0; $j <= $cols - 3; $j++) {
                if ($this->isMagic($grid, $i, $j)) {
                    $count++;
                }
            }
        }

        return $count;

    }

    /**
     * @param $grid
     * @param $r
     * @param $c
     * @return bool
     */
    function isMagic($grid, $r, $c) {
        // Extract the 3x3 grid
        $nums = [
            $grid[$r][$c], $grid[$r][$c+1], $grid[$r][$c+2],
            $grid[$r+1][$c], $grid[$r+1][$c+1], $grid[$r+1][$c+2],
            $grid[$r+2][$c], $grid[$r+2][$c+1], $grid[$r+2][$c+2]
        ];

        // Check for distinct numbers from 1 to 9
        $set = array_fill(1, 9, 0);
        foreach ($nums as $num) {
            if ($num < 1 || $num > 9 || $set[$num] == 1) {
                return false;
            }
            $set[$num] = 1;
        }

        // Check the sums
        return ($grid[$r][$c] + $grid[$r][$c+1] + $grid[$r][$c+2] == 15 &&
            $grid[$r+1][$c] + $grid[$r+1][$c+1] + $grid[$r+1][$c+2] == 15 &&
            $grid[$r+2][$c] + $grid[$r+2][$c+1] + $grid[$r+2][$c+2] == 15 &&
            $grid[$r][$c] + $grid[$r+1][$c] + $grid[$r+2][$c] == 15 &&
            $grid[$r][$c+1] + $grid[$r+1][$c+1] + $grid[$r+2][$c+1] == 15 &&
            $grid[$r][$c+2] + $grid[$r+1][$c+2] + $grid[$r+2][$c+2] == 15 &&
            $grid[$r][$c] + $grid[$r+1][$c+1] + $grid[$r+2][$c+2] == 15 &&
            $grid[$r][$c+2] + $grid[$r+1][$c+1] + $grid[$r+2][$c] == 15);
    }

}