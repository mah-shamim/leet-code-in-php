<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumSum($grid) {
        $m = count($grid);
        $n = count($grid[0]);
        $ones = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $ones[] = [$i, $j];
                }
            }
        }

        $calculateArea = function($points) {
            if (empty($points)) return 0;
            $minRow = PHP_INT_MAX;
            $maxRow = PHP_INT_MIN;
            $minCol = PHP_INT_MAX;
            $maxCol = PHP_INT_MIN;
            foreach ($points as $p) {
                $minRow = min($minRow, $p[0]);
                $maxRow = max($maxRow, $p[0]);
                $minCol = min($minCol, $p[1]);
                $maxCol = max($maxCol, $p[1]);
            }
            return ($maxRow - $minRow + 1) * ($maxCol - $minCol + 1);
        };

        $ans = PHP_INT_MAX;

        for ($i = 0; $i < $m - 1; $i++) {
            for ($j = $i; $j < $m - 1; $j++) {
                $s1 = array_filter($ones, function($p) use ($i) { return $p[0] <= $i; });
                $s2 = array_filter($ones, function($p) use ($i, $j) { return $p[0] > $i && $p[0] <= $j; });
                $s3 = array_filter($ones, function($p) use ($j) { return $p[0] > $j; });
                if (count($s1) == 0 || count($s2) == 0 || count($s3) == 0) continue;
                $area = $calculateArea($s1) + $calculateArea($s2) + $calculateArea($s3);
                if ($area < $ans) $ans = $area;
            }
        }

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i; $j < $n - 1; $j++) {
                $s1 = array_filter($ones, function($p) use ($i) { return $p[1] <= $i; });
                $s2 = array_filter($ones, function($p) use ($i, $j) { return $p[1] > $i && $p[1] <= $j; });
                $s3 = array_filter($ones, function($p) use ($j) { return $p[1] > $j; });
                if (count($s1) == 0 || count($s2) == 0 || count($s3) == 0) continue;
                $area = $calculateArea($s1) + $calculateArea($s2) + $calculateArea($s3);
                if ($area < $ans) $ans = $area;
            }
        }

        for ($k = 0; $k < $n - 1; $k++) {
            $left = array_filter($ones, function($p) use ($k) { return $p[1] <= $k; });
            $right = array_filter($ones, function($p) use ($k) { return $p[1] > $k; });
            if (count($left) == 0 || count($right) == 0) continue;
            for ($i = 0; $i < $m - 1; $i++) {
                $s1 = array_filter($left, function($p) use ($i) { return $p[0] <= $i; });
                $s2 = array_filter($left, function($p) use ($i) { return $p[0] > $i; });
                if (count($s1) == 0 || count($s2) == 0) continue;
                $area = $calculateArea($s1) + $calculateArea($s2) + $calculateArea($right);
                if ($area < $ans) $ans = $area;
            }
        }

        for ($k = 0; $k < $n - 1; $k++) {
            $left = array_filter($ones, function($p) use ($k) { return $p[1] <= $k; });
            $right = array_filter($ones, function($p) use ($k) { return $p[1] > $k; });
            if (count($left) == 0 || count($right) == 0) continue;
            for ($i = 0; $i < $m - 1; $i++) {
                $s1 = array_filter($right, function($p) use ($i) { return $p[0] <= $i; });
                $s2 = array_filter($right, function($p) use ($i) { return $p[0] > $i; });
                if (count($s1) == 0 || count($s2) == 0) continue;
                $area = $calculateArea($left) + $calculateArea($s1) + $calculateArea($s2);
                if ($area < $ans) $ans = $area;
            }
        }

        for ($i = 0; $i < $m - 1; $i++) {
            $top = array_filter($ones, function($p) use ($i) { return $p[0] <= $i; });
            $bottom = array_filter($ones, function($p) use ($i) { return $p[0] > $i; });
            if (count($top) == 0 || count($bottom) == 0) continue;
            for ($k = 0; $k < $n - 1; $k++) {
                $s1 = array_filter($top, function($p) use ($k) { return $p[1] <= $k; });
                $s2 = array_filter($top, function($p) use ($k) { return $p[1] > $k; });
                if (count($s1) == 0 || count($s2) == 0) continue;
                $area = $calculateArea($s1) + $calculateArea($s2) + $calculateArea($bottom);
                if ($area < $ans) $ans = $area;
            }
        }

        for ($i = 0; $i < $m - 1; $i++) {
            $top = array_filter($ones, function($p) use ($i) { return $p[0] <= $i; });
            $bottom = array_filter($ones, function($p) use ($i) { return $p[0] > $i; });
            if (count($top) == 0 || count($bottom) == 0) continue;
            for ($k = 0; $k < $n - 1; $k++) {
                $s1 = array_filter($bottom, function($p) use ($k) { return $p[1] <= $k; });
                $s2 = array_filter($bottom, function($p) use ($k) { return $p[1] > $k; });
                if (count($s1) == 0 || count($s2) == 0) continue;
                $area = $calculateArea($top) + $calculateArea($s1) + $calculateArea($s2);
                if ($area < $ans) $ans = $area;
            }
        }

        return $ans;
    }
}