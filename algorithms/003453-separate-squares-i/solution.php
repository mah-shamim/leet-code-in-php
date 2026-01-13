<?php

class Solution {

    /**
     * @param Integer[][] $squares
     * @return Float
     */
    function separateSquares(array $squares): float
    {
        $n = count($squares);

        // Find min and max y values for binary search range
        $minY = PHP_FLOAT_MAX;
        $maxY = PHP_FLOAT_MIN;

        foreach ($squares as $square) {
            $y = $square[1];
            $l = $square[2];
            $minY = min($minY, $y);
            $maxY = max($maxY, $y + $l);
        }

        // Binary search for the answer
        $left = $minY;
        $right = $maxY;
        $eps = 1e-5;

        while ($right - $left > $eps) {
            $mid = ($left + $right) / 2.0;
            $diff = $this->calculateDifference($squares, $mid);

            if ($diff > 0) {
                // Too much area above, need to move line up
                $left = $mid;
            } else {
                // Too much area below or equal, need to move line down
                $right = $mid;
            }
        }

        return $left;
    }

    /**
     * Calculate f(L) = (total area above L) - (total area below L)
     *
     * @param $squares
     * @param $L
     * @return float|int
     */
    private function calculateDifference($squares, $L): float|int
    {
        $areaAbove = 0.0;
        $areaBelow = 0.0;

        foreach ($squares as $square) {
            $y = $square[1];
            $l = $square[2];
            $top = $y + $l;

            if ($L <= $y) {
                // Line is below or at bottom of square
                $areaAbove += $l * $l;
            } elseif ($L >= $top) {
                // Line is above or at top of square
                $areaBelow += $l * $l;
            } else {
                // Line cuts through the square
                $heightAbove = $top - $L;
                $heightBelow = $L - $y;
                $areaAbove += $heightAbove * $l;
                $areaBelow += $heightBelow * $l;
            }
        }

        return $areaAbove - $areaBelow;
    }
}