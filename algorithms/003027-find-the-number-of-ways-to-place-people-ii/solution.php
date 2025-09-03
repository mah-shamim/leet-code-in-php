<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function numberOfPairs($points) {
        // Sort points by x ascending, and for same x by y descending.
        usort($points, function($a, $b) {
            if ($a[0] == $b[0]) {
                return $b[1] - $a[1];
            }
            return $a[0] - $b[0];
        });

        $n = count($points);
        $count = 0;
        $minValue = -10**18;

        for ($i = 0; $i < $n; $i++) {
            $maxY = $minValue;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($points[$j][1] <= $points[$i][1]) {
                    if ($maxY < $points[$j][1]) {
                        $count++;
                    }
                    if ($points[$j][1] > $maxY) {
                        $maxY = $points[$j][1];
                    }
                }
            }
        }

        return $count;
    }
}