<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumBeauty($nums, $k) {
        // Sort the array
        sort($nums);

        $maxBeauty = 0; // To store the maximum beauty found
        $i = 0;         // Sliding window start index

        // Iterate over the array with `j` as the end index of the window
        for ($j = 0; $j < count($nums); $j++) {
            // Check if the difference is within the allowed range
            while ($nums[$j] - $nums[$i] > 2 * $k) {
                $i++; // Shrink the window from the left
            }
            // Update the maximum beauty (window size)
            $maxBeauty = max($maxBeauty, $j - $i + 1);
        }

        return $maxBeauty;
    }
}