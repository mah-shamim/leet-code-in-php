<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function luckyNumbers ($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);

        $rowMins = [];
        $colMaxs = array_fill(0, $n, PHP_INT_MIN);

        // Find the minimum in each row
        for ($i = 0; $i < $m; $i++) {
            $rowMins[$i] = PHP_INT_MAX;
            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] < $rowMins[$i]) {
                    $rowMins[$i] = $matrix[$i][$j];
                }
            }
        }

        // Find the maximum in each column
        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $m; $i++) {
                if ($matrix[$i][$j] > $colMaxs[$j]) {
                    $colMaxs[$j] = $matrix[$i][$j];
                }
            }
        }

        $luckyNumbers = [];

        // Check for lucky numbers
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] == $rowMins[$i] && $matrix[$i][$j] == $colMaxs[$j]) {
                    $luckyNumbers[] = $matrix[$i][$j];
                }
            }
        }

        return $luckyNumbers;
    }
}