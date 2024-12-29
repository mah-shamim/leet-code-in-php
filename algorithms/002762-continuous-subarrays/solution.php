<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function continuousSubarrays($nums) {
        $n = count($nums);
        $left = 0; // Left pointer of the sliding window
        $count = 0; // Total count of continuous subarrays

        $maxDeque = []; // Deque to store indices for the max value
        $minDeque = []; // Deque to store indices for the min value

        for ($right = 0; $right < $n; $right++) {
            // Maintain the descending order in maxDeque
            while (!empty($maxDeque) && $nums[end($maxDeque)] <= $nums[$right]) {
                array_pop($maxDeque);
            }
            $maxDeque[] = $right;

            // Maintain the ascending order in minDeque
            while (!empty($minDeque) && $nums[end($minDeque)] >= $nums[$right]) {
                array_pop($minDeque);
            }
            $minDeque[] = $right;

            // Shrink the window if the condition is violated
            while ($nums[$maxDeque[0]] - $nums[$minDeque[0]] > 2) {
                $left++;
                // Remove indices that are outside the current window
                if ($maxDeque[0] < $left) array_shift($maxDeque);
                if ($minDeque[0] < $left) array_shift($minDeque);
            }

            // Add the number of valid subarrays ending at `right`
            $count += $right - $left + 1;
        }

        return $count;
    }
}