<?php

class Solution {

    /**
     * @param String[] $timePoints
     * @return Integer
     */
    function findMinDifference($timePoints) {
        // Convert time points to minutes
        $minutes = array_map(function($time) {
            list($hours, $mins) = explode(':', $time);
            return $hours * 60 + $mins;
        }, $timePoints);

        // Sort the minutes array
        sort($minutes);

        $minDiff = PHP_INT_MAX;
        $n = count($minutes);

        // Calculate minimum difference between consecutive times
        for ($i = 1; $i < $n; $i++) {
            $diff = $minutes[$i] - $minutes[$i - 1];
            $minDiff = min($minDiff, $diff);
        }

        // Check the circular difference (from last to first time)
        $circularDiff = (1440 - $minutes[$n - 1]) + $minutes[0];
        $minDiff = min($minDiff, $circularDiff);

        return $minDiff;
    }
}