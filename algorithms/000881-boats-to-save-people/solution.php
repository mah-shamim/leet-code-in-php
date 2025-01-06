<?php

class Solution {

    /**
     * @param Integer[] $people
     * @param Integer $limit
     * @return Integer
     */
    function numRescueBoats($people, $limit) {
        sort($people); // Step 1: Sort the array
        $left = 0; // Pointer for the lightest person
        $right = count($people) - 1; // Pointer for the heaviest person
        $boats = 0;

        // Step 2: Use two pointers to try and pair people
        while ($left <= $right) {
            if ($people[$left] + $people[$right] <= $limit) {
                // If they can share a boat, move both pointers
                $left++;
            }
            // Whether they share or not, the heaviest person takes a boat
            $right--;
            $boats++; // Count the boat used
        }

        return $boats; // Return the total number of boats
    }
}