<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxProductPath(array $grid): int
    {
        $mod = 1000000007;
        $m = count($grid);
        $n = count($grid[0]);

        // DP tables for maximum and minimum product at each cell
        $dp_max = array_fill(0, $m, array_fill(0, $n, null));
        $dp_min = array_fill(0, $m, array_fill(0, $n, null));

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == 0 && $j == 0) {
                    // Starting cell
                    $dp_max[$i][$j] = $grid[$i][$j];
                    $dp_min[$i][$j] = $grid[$i][$j];
                } else {
                    $max_val = PHP_INT_MIN;
                    $min_val = PHP_INT_MAX;
                    $val = $grid[$i][$j];

                    // From top cell (i-1, j)
                    if ($i > 0) {
                        $candidates = [
                            $dp_max[$i-1][$j] * $val,
                            $dp_min[$i-1][$j] * $val
                        ];
                        foreach ($candidates as $c) {
                            if ($c > $max_val) $max_val = $c;
                            if ($c < $min_val) $min_val = $c;
                        }
                    }

                    // From left cell (i, j-1)
                    if ($j > 0) {
                        $candidates = [
                            $dp_max[$i][$j-1] * $val,
                            $dp_min[$i][$j-1] * $val
                        ];
                        foreach ($candidates as $c) {
                            if ($c > $max_val) $max_val = $c;
                            if ($c < $min_val) $min_val = $c;
                        }
                    }

                    $dp_max[$i][$j] = $max_val;
                    $dp_min[$i][$j] = $min_val;
                }
            }
        }

        $result = $dp_max[$m-1][$n-1];
        if ($result < 0) {
            return -1;
        }
        return $result % $mod;
    }
}