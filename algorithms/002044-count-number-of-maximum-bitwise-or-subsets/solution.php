<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countMaxOrSubsets($nums) {
        // Step 1: Calculate the maximum bitwise OR of the entire array
        $maxOR = 0;
        foreach ($nums as $num) {
            $maxOR |= $num; // Bitwise OR operation
        }

        // Step 2: Initialize the count of valid subsets
        $count = 0;
        $n = count($nums);

        // Step 3: Enumerate all subsets using bit manipulation
        // There are 2^n subsets, we loop from 1 to (2^n) - 1 to skip the empty subset
        for ($i = 1; $i < (1 << $n); $i++) {
            $currentOR = 0;
            for ($j = 0; $j < $n; $j++) {
                // Check if the j-th bit is set in i
                if ($i & (1 << $j)) {
                    $currentOR |= $nums[$j]; // Include this element in the subset
                }
            }
            // Step 4: Check if the current subset's OR equals maxOR
            if ($currentOR == $maxOR) {
                $count++;
            }
        }

        return $count;
    }
}