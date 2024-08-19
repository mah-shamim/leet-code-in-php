<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        // Create an associative array (hash map) to store numbers and their indices
        $map = [];

        // Iterate through the array
        foreach ($nums as $index => $num) {
            // Calculate the complement of the current number
            $complement = $target - $num;

            // Check if the complement exists in the map
            if (isset($map[$complement])) {
                // If found, return the indices of the complement and the current number
                return [$map[$complement], $index];
            }

            // Otherwise, add the current number and its index to the map
            $map[$num] = $index;
        }

        // If no solution is found (although the problem guarantees one), return an empty array
        return [];
    }
}