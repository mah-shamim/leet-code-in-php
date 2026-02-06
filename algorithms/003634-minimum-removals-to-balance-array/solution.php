<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minRemoval(array $nums, int $k): int
    {
        // Sort the array to allow sliding window on sorted values
        sort($nums);
        $n = count($nums);
        $j = 0;           // right pointer of the window
        $maxLen = 0;      // length of the longest valid window

        // Expand the window for each possible left pointer i
        for ($i = 0; $i < $n; $i++) {
            // Ensure the right pointer is at least the left pointer
            $j = max($j, $i);

            // Extend the window while the condition holds
            while ($j < $n && $nums[$j] <= $k * $nums[$i]) {
                $j++;
            }

            // Update the maximum window length
            $maxLen = max($maxLen, $j - $i);
        }

        // Minimum removals = total elements - longest balanced subarray
        return $n - $maxLen;
    }
}