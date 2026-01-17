<?php

class Solution {

    /**
     * @param Integer[][] $bottomLeft
     * @param Integer[][] $topRight
     * @return Integer
     */
    function largestSquareArea(array $bottomLeft, array $topRight): int
    {
        $n = count($bottomLeft);
        $maxArea = 0;

        // Check all pairs of rectangles
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                // Compute intersection coordinates
                $x1 = max($bottomLeft[$i][0], $bottomLeft[$j][0]);
                $x2 = min($topRight[$i][0], $topRight[$j][0]);
                $y1 = max($bottomLeft[$i][1], $bottomLeft[$j][1]);
                $y2 = min($topRight[$i][1], $topRight[$j][1]);

                // Check if rectangles intersect
                if ($x1 < $x2 && $y1 < $y2) {
                    $width = $x2 - $x1;
                    $height = $y2 - $y1;
                    $side = min($width, $height);
                    $maxArea = max($maxArea, $side * $side);
                }
            }
        }

        return $maxArea;
    }
}