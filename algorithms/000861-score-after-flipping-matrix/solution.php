<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function matrixScore($grid) {
        $m = count($grid); // Number of rows
        $n = count($grid[0]); // Number of columns

        // Step 1: Ensure all rows start with 1 by flipping rows if necessary
        for ($i = 0; $i < $m; $i++) {
            if ($grid[$i][0] == 0) {
                // Flip the entire row
                for ($j = 0; $j < $n; $j++) {
                    $grid[$i][$j] = 1 - $grid[$i][$j];
                }
            }
        }

        // Step 2: Maximize the number of 1's in each column from the second column onwards
        for ($j = 1; $j < $n; $j++) {
            $onesCount = 0;
            for ($i = 0; $i < $m; $i++) {
                if ($grid[$i][$j] == 1) {
                    $onesCount++;
                }
            }

            // If there are more 0's than 1's in this column, flip the column
            if ($onesCount < $m / 2) {
                for ($i = 0; $i < $m; $i++) {
                    $grid[$i][$j] = 1 - $grid[$i][$j];
                }
            }
        }

        // Step 3: Calculate the final score by interpreting each row as a binary number
        $score = 0;
        for ($i = 0; $i < $m; $i++) {
            $rowValue = 0;
            for ($j = 0; $j < $n; $j++) {
                $rowValue = $rowValue * 2 + $grid[$i][$j];
            }
            $score += $rowValue;
        }

        return $score;
    }
}