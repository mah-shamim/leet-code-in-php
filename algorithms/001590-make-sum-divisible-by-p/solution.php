<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $p
     * @return Integer
     */
    function minSubarray($nums, $p) {
        // Total sum of the array
        $totalSum = array_sum($nums);
        $r = $totalSum % $p; // remainder when total sum is divided by p

        // If remainder is 0, the total sum is already divisible by p
        if ($r == 0) {
            return 0;
        }

        $prefixSum = 0;
        $minLength = PHP_INT_MAX;
        $n = count($nums);

        // Hash map to store the last occurrence of prefix sum % p
        $prefixMap = array(0 => -1);  // Initialize with 0 => -1 for cases when we find a match early

        for ($i = 0; $i < $n; $i++) {
            // Calculate the prefix sum
            $prefixSum = ($prefixSum + $nums[$i]) % $p;

            // We want to find a previous prefix sum that satisfies (prefixSum - r) % p == 0
            $target = ($prefixSum - $r + $p) % $p;

            if (isset($prefixMap[$target])) {
                // Calculate the length of the subarray to remove
                $minLength = min($minLength, $i - $prefixMap[$target]);
            }

            // Update the map with the current prefix sum % p and its index
            $prefixMap[$prefixSum] = $i;
        }

        // If minLength is still INT_MAX, it's impossible to find a valid subarray
        return $minLength < $n ? $minLength : -1;
    }
}