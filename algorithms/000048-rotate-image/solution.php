<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(array &$matrix) {
        $n = count($matrix);

        // Step 1: Transpose the matrix
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $temp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $temp;
            }
        }

        // Step 2: Reverse each row
        for ($i = 0; $i < $n; $i++) {
            $matrix[$i] = array_reverse($matrix[$i]);
        }
    }
}