<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer[][] $mat
     * @return Integer
     */
    function firstCompleteIndex($arr, $mat) {
        $m = count($mat);
        $n = count($mat[0]);

        // Step 1: Preprocess the positions of elements in the matrix
        $position_map = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $position_map[$mat[$i][$j]] = [$i, $j];
            }
        }

        // Step 2: Initialize row and column counts
        $row_count = array_fill(0, $m, 0); // Frequency of painted cells in each row
        $col_count = array_fill(0, $n, 0); // Frequency of painted cells in each column

        // Step 3: Traverse arr and update counts
        foreach ($arr as $i => $value) {
            list($row, $col) = $position_map[$value];

            // Increment the row and column counts
            $row_count[$row]++;
            $col_count[$col]++;

            // Step 4: Check if any row or column is fully painted
            if ($row_count[$row] == $n || $col_count[$col] == $m) {
                return $i;
            }
        }

        // If no row or column is fully painted, return -1 (although the problem guarantees a solution)
        return -1;
    }
}