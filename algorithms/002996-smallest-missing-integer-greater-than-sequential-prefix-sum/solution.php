<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingInteger(array $nums): int
    {
        // Step 1: Find the longest sequential prefix and its sum
        $sum = $nums[0]; // Start with the first element
        $prefixLength = 1;

        // Check the sequential condition
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] == $nums[$i - 1] + 1) {
                $sum += $nums[$i];
                $prefixLength++;
            } else {
                break; // Sequence breaks, stop here
            }
        }

        // Step 2: Find the smallest missing integer >= $sum
        // Create a hash set for O(1) lookups
        $set = array_flip($nums);
        $candidate = $sum;

        while (isset($set[$candidate])) {
            $candidate++;
        }

        return $candidate;
    }
}