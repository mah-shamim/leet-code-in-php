<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function intersectionSizeTwo($intervals) {
        // Sort intervals by end point, and by start point descending if ends are equal
        usort($intervals, function($a, $b) {
            if ($a[1] == $b[1]) {
                return $b[0] - $a[0];
            }
            return $a[1] - $b[1];
        });

        $size = 0;
        $first = -1;
        $second = -1;

        foreach ($intervals as $interval) {
            $start = $interval[0];
            $end = $interval[1];

            // If current interval already has at least two elements from our set
            if ($first >= $start && $second >= $start) {
                continue;
            }

            // If current interval has only one element from our set
            if ($second >= $start) {
                $first = $second;
                $second = $end;
                $size += 1;
            }
            // If current interval has no elements from our set
            else {
                $first = $end - 1;
                $second = $end;
                $size += 2;
            }
        }

        return $size;
    }
}