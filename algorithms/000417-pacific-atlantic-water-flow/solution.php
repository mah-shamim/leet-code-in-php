<?php

class Solution {

    /**
     * @param Integer[][] $heights
     * @return Integer[][]
     */
    function pacificAtlantic($heights) {
        $m = count($heights);
        $n = count($heights[0]);

        $pacific = array_fill(0, $m, array_fill(0, $n, false));
        $atlantic = array_fill(0, $m, array_fill(0, $n, false));

        for ($i = 0; $i < $m; $i++) {
            $this->dfs($heights, $pacific, $i, 0, $m, $n);
            $this->dfs($heights, $atlantic, $i, $n - 1, $m, $n);
        }

        for ($j = 0; $j < $n; $j++) {
            $this->dfs($heights, $pacific, 0, $j, $m, $n);
            $this->dfs($heights, $atlantic, $m - 1, $j, $m, $n);
        }

        $result = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($pacific[$i][$j] && $atlantic[$i][$j]) {
                    $result[] = [$i, $j];
                }
            }
        }

        return $result;
    }

    /**
     * @param $heights
     * @param $visited
     * @param $i
     * @param $j
     * @param $m
     * @param $n
     * @return void
     */
    function dfs($heights, &$visited, $i, $j, $m, $n) {
        $visited[$i][$j] = true;
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];

        foreach ($directions as $dir) {
            $x = $i + $dir[0];
            $y = $j + $dir[1];

            if ($x >= 0 && $x < $m && $y >= 0 && $y < $n &&
                !$visited[$x][$y] && $heights[$x][$y] >= $heights[$i][$j]) {
                $this->dfs($heights, $visited, $x, $y, $m, $n);
            }
        }
    }
}