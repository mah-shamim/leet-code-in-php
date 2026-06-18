<?php

class Solution {

    /**
     * @param Integer $hour
     * @param Integer $minutes
     * @return Float
     */
    function angleClock(int $hour, int $minutes): float
    {
        // Calculate the angles
        $minuteAngle = $minutes * 6;
        $hourAngle = ($hour % 12) * 30 + $minutes * 0.5;

        // Absolute difference
        $diff = abs($hourAngle - $minuteAngle);

        // Return the smaller angle
        return min($diff, 360 - $diff);
    }
}