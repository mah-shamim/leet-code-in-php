<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countNegatives($grid) {
        $count = 0;
        $m = count($grid);
        $n = count($grid[0]);

        foreach ($grid as $row) {
            // Find first negative in current row
            $left = 0;
            $right = $n - 1;

            while ($left <= $right) {
                $mid = (int)(($left + $right) / 2);

                if ($row[$mid] < 0) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            // All elements from left to n-1 are negative
            $count += $n - $left;
        }

        return $count;
    }
}