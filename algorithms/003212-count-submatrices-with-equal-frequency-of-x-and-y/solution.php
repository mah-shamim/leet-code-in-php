<?php

class Solution {

    /**
     * Counts submatrices that start at (0,0) and have equal number of 'X' and 'Y'
     * and contain at least one 'X'.
     *
     * @param String[][] $grid
     * @return Integer
     */
    function numberOfSubmatrices(array $grid): int
    {
        $rows = count($grid);
        $cols = count($grid[0]);

        // Prefix sums and X count for the previous row
        $prevSum = array_fill(0, $cols, 0);
        $prevX   = array_fill(0, $cols, 0);
        $result = 0;

        for ($i = 0; $i < $rows; $i++) {
            $currSum = array_fill(0, $cols, 0);
            $currX   = array_fill(0, $cols, 0);

            for ($j = 0; $j < $cols; $j++) {
                // Map character to value and X indicator
                $val  = 0;
                $xVal = 0;
                if ($grid[$i][$j] === 'X') {
                    $val  = 1;
                    $xVal = 1;
                } elseif ($grid[$i][$j] === 'Y') {
                    $val = -1;
                }
                // else both stay 0

                // 2D prefix sum: top + left - top-left + current value
                $top     = ($i > 0) ? $prevSum[$j] : 0;
                $left    = ($j > 0) ? $currSum[$j - 1] : 0;
                $topLeft = ($i > 0 && $j > 0) ? $prevSum[$j - 1] : 0;
                $currSum[$j] = $top + $left - $topLeft + $val;

                // 2D prefix count of 'X': same logic
                $topX     = ($i > 0) ? $prevX[$j] : 0;
                $leftX    = ($j > 0) ? $currX[$j - 1] : 0;
                $topLeftX = ($i > 0 && $j > 0) ? $prevX[$j - 1] : 0;
                $currX[$j] = $topX + $leftX - $topLeftX + $xVal;

                // Check conditions for submatrix (0,0) to (i,j)
                if ($currSum[$j] == 0 && $currX[$j] > 0) {
                    $result++;
                }
            }

            // Move to next row
            $prevSum = $currSum;
            $prevX   = $currX;
        }

        return $result;
    }
}