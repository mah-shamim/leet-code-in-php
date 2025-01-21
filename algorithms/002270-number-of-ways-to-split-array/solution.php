<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function waysToSplitArray($nums) {
        $n = count($nums);
        $totalSum = array_sum($nums);
        $prefixSum = 0;
        $validSplits = 0;

        // Iterate over the array and check for valid splits
        for ($i = 0; $i < $n - 1; $i++) {
            $prefixSum += $nums[$i];
            $remainingSum = $totalSum - $prefixSum;

            // Check if the prefix sum is greater than or equal to the remaining sum
            if ($prefixSum >= $remainingSum) {
                $validSplits++;
            }
        }

        return $validSplits;
    }
}