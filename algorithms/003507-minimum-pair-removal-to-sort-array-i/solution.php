<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumPairRemoval(array $nums): int
    {
        $operations = 0;

        // Helper function to check if an array is non-decreasing
        $isNonDecreasing = function($arr) {
            for ($i = 1; $i < count($arr); $i++) {
                if ($arr[$i] < $arr[$i-1]) {
                    return false;
                }
            }
            return true;
        };

        // If already non-decreasing, no operations needed
        if ($isNonDecreasing($nums)) {
            return 0;
        }

        $arr = $nums;

        while (!$isNonDecreasing($arr)) {
            $n = count($arr);
            $minSum = PHP_INT_MAX;
            $minIndex = -1;

            // Find the adjacent pair with the minimum sum (leftmost if ties)
            for ($i = 0; $i < $n - 1; $i++) {
                $sum = $arr[$i] + $arr[$i+1];
                if ($sum < $minSum) {
                    $minSum = $sum;
                    $minIndex = $i;
                }
            }

            // Replace the pair with their sum
            $sum = $arr[$minIndex] + $arr[$minIndex+1];
            array_splice($arr, $minIndex, 2, $sum);
            $operations++;
        }

        return $operations;
    }
}