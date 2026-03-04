<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSpecial(array $mat): int
    {
        $m = count($mat);
        $n = count($mat[0]);

        // Count ones in each row and each column
        $rowCount = array_fill(0, $m, 0);
        $colCount = array_fill(0, $n, 0);

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($mat[$i][$j] == 1) {
                    $rowCount[$i]++;
                    $colCount[$j]++;
                }
            }
        }

        // Count special positions
        $special = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($mat[$i][$j] == 1 && $rowCount[$i] == 1 && $colCount[$j] == 1) {
                    $special++;
                }
            }
        }

        return $special;
    }
}