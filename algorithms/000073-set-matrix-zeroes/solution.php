<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        $m = count($matrix);
        if ($m == 0) return;
        $n = count($matrix[0]);

        $firstRowZero = false;
        $firstColZero = false;

        // Check if first row has any zero
        for ($j = 0; $j < $n; $j++) {
            if ($matrix[0][$j] == 0) {
                $firstRowZero = true;
                break;
            }
        }

        // Check if first column has any zero
        for ($i = 0; $i < $m; $i++) {
            if ($matrix[$i][0] == 0) {
                $firstColZero = true;
                break;
            }
        }

        // Mark rows and columns based on other elements
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                if ($matrix[$i][$j] == 0) {
                    $matrix[$i][0] = 0;
                    $matrix[0][$j] = 0;
                }
            }
        }

        // Set rows to zero based on first column
        for ($i = 1; $i < $m; $i++) {
            if ($matrix[$i][0] == 0) {
                for ($j = 0; $j < $n; $j++) {
                    $matrix[$i][$j] = 0;
                }
            }
        }

        // Set columns to zero based on first row
        for ($j = 1; $j < $n; $j++) {
            if ($matrix[0][$j] == 0) {
                for ($i = 0; $i < $m; $i++) {
                    $matrix[$i][$j] = 0;
                }
            }
        }

        // Set first row to zero if needed
        if ($firstRowZero) {
            for ($j = 0; $j < $n; $j++) {
                $matrix[0][$j] = 0;
            }
        }

        // Set first column to zero if needed
        if ($firstColZero) {
            for ($i = 0; $i < $m; $i++) {
                $matrix[$i][0] = 0;
            }
        }
    }
}