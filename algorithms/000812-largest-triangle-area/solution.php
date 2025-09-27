<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Float
     */
    function largestTriangleArea($points) {
        $maxArea = 0;
        $n = count($points);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                for ($k = $j + 1; $k < $n; $k++) {
                    $x1 = $points[$i][0];
                    $y1 = $points[$i][1];
                    $x2 = $points[$j][0];
                    $y2 = $points[$j][1];
                    $x3 = $points[$k][0];
                    $y3 = $points[$k][1];
                    $area = 0.5 * abs($x1 * ($y2 - $y3) + $x2 * ($y3 - $y1) + $x3 * ($y1 - $y2));
                    if ($area > $maxArea) {
                        $maxArea = $area;
                    }
                }
            }
        }
        return $maxArea;
    }
}