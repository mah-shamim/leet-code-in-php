<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function frequencySort($nums) {
        // Step 1: Count the frequency of each value in the array
        $frequency = array_count_values($nums);

        // Step 2: Custom sort based on frequency and then by value (decreasing order for ties)
        usort($nums, function($a, $b) use ($frequency) {
            if ($frequency[$a] == $frequency[$b]) {
                return $b - $a; // Sort by value in decreasing order
            }
            return $frequency[$a] - $frequency[$b]; // Sort by frequency in increasing order
        });

        return $nums;
    }
}