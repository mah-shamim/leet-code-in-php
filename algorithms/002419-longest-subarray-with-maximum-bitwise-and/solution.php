<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums) {
        // Step 1: Find the maximum value in the array
        $maxValue = max($nums);

        // Step 2: Initialize variables to keep track of the longest subarray length
        $maxLength = 0;
        $currentLength = 0;

        // Step 3: Traverse through the array to find the longest subarray with the max value
        foreach ($nums as $num) {
            if ($num == $maxValue) {
                // Increment the current subarray length if it's equal to the max value
                $currentLength++;
            } else {
                // Update the maxLength if the current sequence ends
                if ($currentLength > $maxLength) {
                    $maxLength = $currentLength;
                }
                // Reset the current length since we encountered a different number
                $currentLength = 0;
            }
        }

        // Final check at the end in case the longest subarray is at the end of the array
        if ($currentLength > $maxLength) {
            $maxLength = $currentLength;
        }

        // Return the longest length found
        return $maxLength;

    }
}