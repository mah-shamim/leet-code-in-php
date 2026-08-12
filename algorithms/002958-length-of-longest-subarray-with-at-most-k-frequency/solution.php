<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxSubarrayLength(array $nums, int $k): int
    {
        $n = count($nums);
        $freq = []; // frequency map for current window
        $left = 0;
        $maxLength = 0;

        for ($right = 0; $right < $n; $right++) {
            // Add current element to window
            $current = $nums[$right];
            $freq[$current] = ($freq[$current] ?? 0) + 1;

            // If frequency exceeds k, shrink window from left
            while ($freq[$current] > $k) {
                $leftElement = $nums[$left];
                $freq[$leftElement]--;
                if ($freq[$leftElement] == 0) {
                    unset($freq[$leftElement]);
                }
                $left++;
            }

            // Update max length
            $maxLength = max($maxLength, $right - $left + 1);
        }

        return $maxLength;
    }
}