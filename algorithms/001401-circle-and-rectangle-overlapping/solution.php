<?php

class Solution {

    /**
     * @param Integer $radius
     * @param Integer $xCenter
     * @param Integer $yCenter
     * @param Integer $x1
     * @param Integer $y1
     * @param Integer $x2
     * @param Integer $y2
     * @return Boolean
     */
    function checkOverlap(int $radius, int $xCenter, int $yCenter, int $x1, int $y1, int $x2, int $y2): bool
    {
        // Find the closest point on the rectangle to the circle center.
        $closestX = max($x1, min($xCenter, $x2));
        $closestY = max($y1, min($yCenter, $y2));

        $dx = $xCenter - $closestX;
        $dy = $yCenter - $closestY;

        // Check if the distance is less than or equal to the radius.
        return ($dx * $dx + $dy * $dy) <= ($radius * $radius);
    }
}