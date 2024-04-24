<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumOperations(array $grid): int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $f = array_fill(0, $n, array_fill(0, 10, INF));

        for ($i = 0; $i < $n; ++$i) {
            $cnt = array_fill(0, 10, 0);
            for ($j = 0; $j < $m; ++$j) {
                $cnt[$grid[$j][$i]]++;
            }
            if ($i == 0) {
                for ($j = 0; $j < 10; ++$j) {
                    $f[$i][$j] = $m - $cnt[$j];
                }
            } else {
                for ($j = 0; $j < 10; ++$j) {
                    for ($k = 0; $k < 10; ++$k) {
                        if ($k != $j) {
                            $f[$i][$j] = min($f[$i][$j], $f[$i - 1][$k] + $m - $cnt[$j]);
                        }
                    }
                }
            }
        }
        return min($f[$n - 1]);
    }
}