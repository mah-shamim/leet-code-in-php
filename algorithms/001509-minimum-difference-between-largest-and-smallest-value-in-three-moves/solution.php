<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minDifference($nums) {
        $n = count($nums);

        // If the array has 4 or fewer elements, the difference is zero because we can remove all but one element.
        if ($n <= 4) {
            return 0;
        }

        // Sort the array to facilitate the calculation of differences after removals.
        sort($nums);

        // We consider removing 0, 1, 2, or 3 elements from the start or the end.
        // Calculate the differences:
        // 1. Remove 3 from start: nums[n-1] - nums[3]
        // 2. Remove 2 from start, 1 from end: nums[n-2] - nums[2]
        // 3. Remove 1 from start, 2 from end: nums[n-3] - nums[1]
        // 4. Remove 3 from end: nums[n-4] - nums[0]
        $differences = [
            $nums[$n - 1] - $nums[3],
            $nums[$n - 2] - $nums[2],
            $nums[$n - 3] - $nums[1],
            $nums[$n - 4] - $nums[0]
        ];

        // Return the minimum difference.
        return min($differences);
    }
}