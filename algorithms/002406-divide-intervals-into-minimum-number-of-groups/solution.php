<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function minGroups($intervals) {
        $events = [];

        // Convert intervals into start and end events
        foreach ($intervals as $interval) {
            $events[] = [$interval[0], 1];     // +1 for start of an interval
            $events[] = [$interval[1] + 1, -1]; // -1 for end of an interval (right+1 to make it inclusive)
        }

        // Sort events based on time, and prioritize end (-1) over start (+1) if times are equal
        usort($events, function($a, $b) {
            if ($a[0] == $b[0]) {
                return $a[1] - $b[1];
            }
            return $a[0] - $b[0];
        });

        $maxGroups = 0;
        $currentGroups = 0;

        // Process the events
        foreach ($events as $event) {
            $currentGroups += $event[1];
            $maxGroups = max($maxGroups, $currentGroups);
        }

        return $maxGroups;
    }
}