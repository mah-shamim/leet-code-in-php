<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maximumSafenessFactor(array $grid): int
    {
        $n = count($grid);
        $g = array_fill(0, $n, array_fill(0, $n, -1));
        $vis = array_fill(0, $n, array_fill(0, $n, false));
        $q = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] === 1) {
                    array_push($q, [$i, $j]);
                }
            }
        }
        $level = 0;
        while (!empty($q)) {
            $t = [];
            foreach ($q as $coord) {
                [$x, $y] = $coord;
                if ($x < 0 || $y < 0 || $x === $n || $y === $n || $g[$x][$y] !== -1) {
                    continue;
                }
                $g[$x][$y] = $level;
                array_push($t, [$x + 1, $y]);
                array_push($t, [$x - 1, $y]);
                array_push($t, [$x, $y + 1]);
                array_push($t, [$x, $y - 1]);
            }
            $q = $t;
            $level++;
        }
        $dfs = function($i, $j, $v) use (&$dfs, $n, &$vis, &$g) {
            if ($i < 0 || $j < 0 || $i === $n || $j === $n || $vis[$i][$j] || $g[$i][$j] <= $v) {
                return false;
            }
            $vis[$i][$j] = true;
            return (
                ($i === $n - 1 && $j === $n - 1) ||
                $dfs($i + 1, $j, $v) ||
                $dfs($i, $j + 1, $v) ||
                $dfs($i - 1, $j, $v) ||
                $dfs($i, $j - 1, $v)
            );
        };

        $left = 0;
        $right = $level;
        while ($left < $right) {
            array_walk($vis, function(&$v) { $v = false; });
            $mid = ($left + $right) >> 1;
            if ($dfs(0, 0, $mid)) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        return $right;
    }
}