<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function maxMatrixSum($matrix) {
        $n = count($matrix);
        $sum = 0;
        $minAbs = PHP_INT_MAX;
        $negativeCount = 0;

        // Iterate through the matrix
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $sum += abs($matrix[$i][$j]);
                $minAbs = min($minAbs, abs($matrix[$i][$j]));
                if ($matrix[$i][$j] < 0) {
                    $negativeCount++;
                }
            }
        }

        // If there is an odd number of negatives, subtract twice the smallest absolute value
        if ($negativeCount % 2 != 0) {
            $sum -= 2 * $minAbs;
        }

        return $sum;
    }
}