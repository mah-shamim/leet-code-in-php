<?php

class Solution {

    /**
     * @param Integer[][] $dimensions
     * @return Integer
     */
    function areaOfMaxDiagonal($dimensions) {
        $maxDiagonalSq = 0;
        $maxArea = 0;

        foreach ($dimensions as $rect) {
            $l = $rect[0];
            $w = $rect[1];
            $diagonalSq = $l * $l + $w * $w;
            $area = $l * $w;

            if ($diagonalSq > $maxDiagonalSq) {
                $maxDiagonalSq = $diagonalSq;
                $maxArea = $area;
            } elseif ($diagonalSq == $maxDiagonalSq) {
                if ($area > $maxArea) {
                    $maxArea = $area;
                }
            }
        }

        return $maxArea;
    }
}