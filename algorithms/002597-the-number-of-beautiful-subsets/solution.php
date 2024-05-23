<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function beautifulSubsets($nums, $k) {
        $countBeautifulSubsets = -1; // Initialize the counter for beautiful subsets to -1.

        $countNums = array_fill(0, 1010, 0); // Array to keep track of the frequency of each number.

        $size = count($nums); // Store the size of the input array 'nums'.

        // Define a recursive anonymous function to perform depth-first search for beautiful subsets.

        $dfs = function($index) use (&$dfs, &$countBeautifulSubsets, &$nums, &$countNums, $size, $k) {

            if ($index >= $size) { // Base case: If the end of the array is reached,

                ++$countBeautifulSubsets; // increment the count of beautiful subsets.

                return; // Exit the current recursive call.

            }

            $dfs($index + 1); // Recursive call to continue without including the current number.

            // Check if the number is considered beautiful in the context of the subset being formed.

            $isBeautifulIncrement = $nums[$index] + $k >= 1010 || $countNums[$nums[$index] + $k] == 0;

            $isBeautifulDecrement = $nums[$index] - $k < 0 || $countNums[$nums[$index] - $k] == 0;

            // If both conditions are true, the number can be included in the subset.

            if ($isBeautifulIncrement && $isBeautifulDecrement) {

                ++$countNums[$nums[$index]]; // Increment the count for the current number.

                $dfs($index + 1); // Recursive call to continue with the current number included.

                --$countNums[$nums[$index]]; // Backtrack: Decrement the count after exploring.

            }

        };

        $dfs(0); // Start the depth-first search from the first index.

        return $countBeautifulSubsets; // Return the final count of beautiful subsets.
    }
}