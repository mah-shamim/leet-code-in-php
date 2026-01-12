<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minTimeToVisitAllPoints(array $points): int
    {
        $time = 0;
        for ($i = 0; $i < count($points) - 1; $i++) {
            $time += max(
                abs($points[$i+1][0] - $points[$i][0]),
                abs($points[$i+1][1] - $points[$i][1])
            );
        }
        return $time;
    }
}