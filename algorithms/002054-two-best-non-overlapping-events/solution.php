<?php

class Solution {

    /**
     * @param Integer[][] $events
     * @return Integer
     */
    function maxTwoEvents($events) {
        // Step 1: Sort events by end time
        usort($events, function ($a, $b) {
            return $a[1] - $b[1]; // Sort by endTime
        });

        $n = count($events);
        $maxSum = 0;
        $maxUpTo = []; // Maximum value up to index i
        $maxValueSoFar = 0;

        // Step 2: Prepare a list of end times for binary search
        $endTimes = array_column($events, 1);

        // Step 3: Iterate through events
        foreach ($events as $i => $event) {
            $startTime = $event[0];
            $endTime = $event[1];
            $value = $event[2];

            // Use binary search to find the latest non-overlapping event
            $left = 0;
            $right = $i - 1;
            $bestIndex = -1;

            while ($left <= $right) {
                $mid = intval(($left + $right) / 2);
                if ($endTimes[$mid] < $startTime) {
                    $bestIndex = $mid; // Potential candidate
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }

            // If a non-overlapping event is found, use its maximum value
            $currentSum = $value;
            if ($bestIndex != -1) {
                $currentSum += $maxUpTo[$bestIndex];
            }

            // Update the maximum sum found so far
            $maxSum = max($maxSum, $currentSum);

            // Update the max value up to the current index
            $maxValueSoFar = max($maxValueSoFar, $value);
            $maxUpTo[$i] = $maxValueSoFar;
        }

        return $maxSum;
    }
}