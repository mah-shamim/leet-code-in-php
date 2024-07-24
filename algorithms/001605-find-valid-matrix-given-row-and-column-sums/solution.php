<?php

class Solution {

    /**
     * @param Integer[] $rowSum
     * @param Integer[] $colSum
     * @return Integer[][]
     */
    function restoreMatrix($rowSum, $colSum) {
        $m = count($rowSum);
        $n = count($colSum);
        $matrix = array_fill(0, $m, array_fill(0, $n, 0));

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $val = min($rowSum[$i], $colSum[$j]);
                $matrix[$i][$j] = $val;
                $rowSum[$i] -= $val;
                $colSum[$j] -= $val;
            }
        }

        return $matrix;
    }
}