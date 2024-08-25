<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer
     */
    function minPatches($nums, $n) {
        $ans = 0; // Number of patches added
        $i = 0;  // Index in the array nums
        $miss = 1; // The smallest number that we can't form yet
        while ($miss <= $n) {
            if ($i < count($nums) && $nums[$i] <= $miss) {
                // If nums[i] is within the range we need to cover
                $miss += $nums[$i++];
            } else {
                // If nums[i] is greater than the current miss, we need to patch
                $miss += $miss;  // Add `miss` itself to cover the missing number
                ++$ans;
            }
        }
        return $ans;
    }
}