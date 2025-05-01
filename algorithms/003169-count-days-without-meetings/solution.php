<?php

class Solution {

    /**
     * @param Integer $days
     * @param Integer[][] $meetings
     * @return Integer
     */
    function countDays($days, $meetings) {
        // Sort the meetings by their start time
        usort($meetings, function($a, $b) {
            return $a[0] - $b[0];
        });

        // Merge overlapping intervals
        $merged = array();
        foreach ($meetings as $meeting) {
            if (empty($merged)) {
                $merged[] = $meeting;
            } else {
                $lastIdx = count($merged) - 1;
                $last = &$merged[$lastIdx];
                if ($meeting[0] <= $last[1]) {
                    // Merge the intervals
                    $last[1] = max($last[1], $meeting[1]);
                } else {
                    $merged[] = $meeting;
                }
            }
        }

        // Calculate the total covered days
        $covered = 0;
        foreach ($merged as $interval) {
            $covered += $interval[1] - $interval[0] + 1;
        }

        // The result is total days minus covered days
        return $days - $covered;
    }
}