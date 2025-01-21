<?php

class Solution {

    /**
     * @param Integer[][] $times
     * @param Integer $targetFriend
     * @return Integer
     */
    function smallestChair($times, $targetFriend) {
        $nextUnsatChair = 0;
        $emptyChairs = new SplMinHeap(); // Min heap for empty chairs
        $occupied = new SplMinHeap(); // Min heap for occupied chairs

        // Append the index to each time entry
        foreach ($times as $i => $time) {
            $times[$i][] = $i; // Add index to the end of each time entry
        }

        // Sort times based on arrival time
        usort($times, function($a, $b) {
            return $a[0] - $b[0];
        });

        foreach ($times as $time) {
            $arrival = $time[0];
            $leaving = $time[1];
            $i = $time[2];

            // Free chairs that have become available
            while (!$occupied->isEmpty() && $occupied->top()[0] <= $arrival) {
                $emptyChairs->insert($occupied->top()[1]);
                $occupied->extract(); // Remove the top element
            }

            // Check if this is the target friend
            if ($i == $targetFriend) {
                return $emptyChairs->isEmpty() ? $nextUnsatChair : $emptyChairs->top();
            }

            // Allocate chair
            if ($emptyChairs->isEmpty()) {
                $occupied->insert([$leaving, $nextUnsatChair++]);
            } else {
                $occupied->insert([$leaving, $emptyChairs->top()]);
                $emptyChairs->extract(); // Remove the used chair
            }
        }

        return -1; // This should never happen
    }
}