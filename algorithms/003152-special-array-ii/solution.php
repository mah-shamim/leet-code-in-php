<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Boolean[]
     */
    function isArraySpecial($nums, $queries) {
        $n = count($nums);
        $parity_change = array_fill(0, $n - 1, 0);

        // Step 1: Preprocess the array to find parity transitions
        for ($i = 0; $i < $n - 1; $i++) {
            if (($nums[$i] % 2) !== ($nums[$i + 1] % 2)) {
                $parity_change[$i] = 1; // Different parity
            }
        }

        // Step 2: Create prefix sum array to track the number of parity transitions
        $prefix_sum = array_fill(0, $n, 0);
        for ($i = 1; $i < $n; $i++) {
            $prefix_sum[$i] = $prefix_sum[$i - 1] + $parity_change[$i - 1];
        }

        // Step 3: Process each query
        $result = [];
        foreach ($queries as $query) {
            list($from, $to) = $query;
            // Check if all pairs in the range [from, to] have different parity
            $transition_count = $prefix_sum[$to] - $prefix_sum[$from];
            if ($transition_count == ($to - $from)) {
                $result[] = true;
            } else {
                $result[] = false;
            }
        }

        return $result;
    }
}