<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function largestInteger(array $nums, int $k): int
    {
        $n = count($nums);

        // Case 1: k == 1
        if ($k == 1) {
            $freq = array_count_values($nums);
            $maxVal = -1;
            foreach ($freq as $num => $count) {
                if ($count == 1) {
                    $maxVal = max($maxVal, $num);
                }
            }
            return $maxVal;
        }

        // Case 2: k == n
        if ($k == $n) {
            return max($nums);
        }

        // Case 3: 1 < k < n
        $freq = array_count_values($nums);
        $first = $nums[0];
        $last = $nums[$n - 1];

        $candidates = [];
        if ($freq[$first] == 1) $candidates[] = $first;
        if ($freq[$last] == 1) $candidates[] = $last;

        if (empty($candidates)) return -1;
        return max($candidates);
    }
}