<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        // Count occurrences of each element in both arrays
        $counts1 = array_count_values($nums1);
        $counts2 = array_count_values($nums2);

        $intersection = [];

        // Iterate through the first count array
        foreach ($counts1 as $num => $count) {
            // Check if the element exists in the second array
            if (isset($counts2[$num])) {
                // Find the minimum occurrence
                $minCount = min($count, $counts2[$num]);
                // Add the element to the result array, repeated $minCount times
                for ($i = 0; $i < $minCount; $i++) {
                    $intersection[] = $num;
                }
            }
        }

        return $intersection;
    }
}