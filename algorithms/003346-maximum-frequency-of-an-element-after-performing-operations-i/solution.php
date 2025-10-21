<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $numOperations
     * @return Integer
     */
    function maxFrequency($nums, $k, $numOperations) {
        $n = count($nums);
        if ($n === 0) return 0;

        // Find the range of possible target values
        $minV = min($nums);
        $maxV = max($nums);
        $L = $minV - $k;
        $R = $maxV + $k;
        $size = $R - $L + 1;
        $offset = -$L; // To map values to array indices

        // Initialize arrays
        $diff = array_fill(0, $size + 1, 0);
        $exact = array_fill(0, $size, 0);

        // For each element, mark the range of values it can be transformed to
        foreach ($nums as $v) {
            // The element v can be transformed to any value in [v-k, v+k]
            $left = max(0, $v - $k + $offset);
            $right = min($size - 1, $v + $k + $offset);

            $diff[$left] += 1;
            if ($right + 1 < count($diff)) {
                $diff[$right + 1] -= 1;
            }

            // Count exact occurrences
            $exactPos = $v + $offset;
            if ($exactPos >= 0 && $exactPos < $size) {
                $exact[$exactPos] += 1;
            }
        }

        // Calculate prefix sums to get coverage count for each position
        $ans = 0;
        $current = 0;
        for ($i = 0; $i < $size; $i++) {
            $current += $diff[$i];
            $coverage = $current;  // Elements that can reach value (L + i)
            $already = $exact[$i]; // Elements already equal to (L + i)

            // Maximum frequency is limited by:
            // 1. Number of elements that can reach this value
            // 2. Number of exact matches plus available operations
            $possible = min($coverage, $already + $numOperations);
            if ($possible > $ans) {
                $ans = $possible;
            }
        }

        return $ans;
    }
}