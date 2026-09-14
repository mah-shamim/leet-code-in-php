<?php

class Solution {

    /**
     * @param Integer[] $rec1
     * @param Integer[] $rec2
     * @return Boolean
     */
    function isRectangleOverlap(array $rec1, array $rec2): bool
    {
        // Check if rectangles overlap on x-axis
        // They overlap if the left edge of one is less than the right edge of the other
        $xOverlap = max($rec1[0], $rec2[0]) < min($rec1[2], $rec2[2]);

        // Check if rectangles overlap on y-axis
        $yOverlap = max($rec1[1], $rec2[1]) < min($rec1[3], $rec2[3]);

        // Both axes must overlap for rectangles to overlap
        return $xOverlap && $yOverlap;
    }
}