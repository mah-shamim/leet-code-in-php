<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isGood(array $nums): bool
    {
        $n = max($nums);

        // Check length
        if (count($nums) != $n + 1) {
            return false;
        }

        // Count frequency
        $freq = array_count_values($nums);

        // Check each required value
        for ($i = 1; $i < $n; $i++) {
            if (!isset($freq[$i]) || $freq[$i] != 1) {
                return false;
            }
        }

        // Check n appears exactly twice
        return isset($freq[$n]) && $freq[$n] == 2;
    }
}