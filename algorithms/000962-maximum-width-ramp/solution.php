<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxWidthRamp($nums) {
        $n = count($nums);
        $stack = [];
        $maxWidth = 0;

        // Step 1: Create a decreasing stack
        for ($i = 0; $i < $n; $i++) {
            // Add index only if the current value is less than the value at the index at the top of the stack
            if (empty($stack) || $nums[$stack[count($stack) - 1]] > $nums[$i]) {
                array_push($stack, $i);
            }
        }

        // Step 2: Traverse from the end of the array
        for ($j = $n - 1; $j >= 0; $j--) {
            // While the stack is not empty and nums[stackTop] <= nums[j]
            while (!empty($stack) && $nums[$stack[count($stack) - 1]] <= $nums[$j]) {
                // Calculate the ramp width and update maxWidth
                $i = array_pop($stack);
                $maxWidth = max($maxWidth, $j - $i);
            }
        }

        return $maxWidth;
    }
}