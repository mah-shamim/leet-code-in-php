<?php

class Solution {

    /**
     * @param Integer[] $banned
     * @param Integer $n
     * @param Integer $maxSum
     * @return Integer
     */
    function maxCount($banned, $n, $maxSum) {
        // Convert banned array to a set for O(1) lookup
        $bannedSet = array_flip($banned);

        $sum = 0;  // Initialize the running sum
        $count = 0;  // Initialize the count of numbers we can select

        // Loop through numbers from 1 to n
        for ($i = 1; $i <= $n; $i++) {
            // Skip numbers that are in the banned set
            if (isset($bannedSet[$i])) {
                continue;
            }

            // Check if adding this number exceeds maxSum
            if ($sum + $i > $maxSum) {
                break;
            }

            // Add this number to the sum and increment the count
            $sum += $i;
            $count++;
        }

        return $count;
    }
}