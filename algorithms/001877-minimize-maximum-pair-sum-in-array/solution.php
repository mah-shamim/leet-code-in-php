<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minPairSum(array $nums): int
    {
        // Sort the array
        sort($nums);

        $n = count($nums);
        $maxPairSum = 0;

        // Pair the smallest with the largest, second smallest with second largest, etc.
        for ($i = 0; $i < $n / 2; $i++) {
            $currentPairSum = $nums[$i] + $nums[$n - 1 - $i];
            $maxPairSum = max($maxPairSum, $currentPairSum);
        }

        return $maxPairSum;
    }
}