<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function countSquares($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);
        $dp = array_fill(0, $m, array_fill(0, $n, 0));
        $totalSquares = 0;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] == 1) {
                    if ($i == 0 || $j == 0) {
                        // If it's on the first row or first column
                        $dp[$i][$j] = 1;
                    } else {
                        $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]) + 1;
                    }
                    $totalSquares += $dp[$i][$j];
                }
            }
        }

        return $totalSquares;
    }
}