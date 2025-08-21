<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSubmat($mat) {
        $m = count($mat);
        $n = count($mat[0]);
        $h = array_fill(0, $n, 0);
        $total = 0;

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($mat[$i][$j] == 1) {
                    $h[$j]++;
                } else {
                    $h[$j] = 0;
                }
            }

            for ($j = 0; $j < $n; $j++) {
                $min = $h[$j];
                $total += $min;
                for ($k = $j - 1; $k >= 0; $k--) {
                    if ($h[$k] < $min) {
                        $min = $h[$k];
                    }
                    $total += $min;
                }
            }
        }

        return $total;
    }
}