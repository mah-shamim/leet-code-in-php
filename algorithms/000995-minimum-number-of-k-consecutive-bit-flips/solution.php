<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minKBitFlips($nums, $k) {
        // Keeps track of flipped states
        $flipped = array_fill(0, count($nums), false);
        // Tracks valid flips within the past window
        $validFlipsFromPastWindow = 0;
        // Counts total flips needed
        $flipCount = 0;

        for ($i = 0; $i < count($nums); $i++) {
            if ($i >= $k) {
                // Decrease count of valid flips from the past window if needed
                if ($flipped[$i - $k]) {
                    $validFlipsFromPastWindow--;
                }
            }

            // Check if current bit needs to be flipped
            if ($validFlipsFromPastWindow % 2 == $nums[$i]) {
                // If flipping the window extends beyond the array length,
                // return -1
                if ($i + $k > count($nums)) {
                    return -1;
                }
                // Increment the count of valid flips and mark current as
                // flipped
                $validFlipsFromPastWindow++;
                $flipped[$i] = true;
                $flipCount++;
            }
        }

        return $flipCount;
    }
}