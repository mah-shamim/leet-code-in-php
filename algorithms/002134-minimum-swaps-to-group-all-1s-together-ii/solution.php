<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minSwaps($nums) {
        $n = count($nums);
        $totalOnes = array_sum($nums);

        // If there are no 1s, no swaps are needed
        if ($totalOnes == 0) {
            return 0;
        }

        // Extend the array by appending itself
        $extendedNums = array_merge($nums, $nums);

        // Initial count of 0s in the first window
        $zeroCount = 0;
        for ($i = 0; $i < $totalOnes; $i++) {
            if ($extendedNums[$i] == 0) {
                $zeroCount++;
            }
        }

        $minSwaps = $zeroCount;

        // Slide the window across the extended array
        for ($i = $totalOnes; $i < count($extendedNums); $i++) {
            if ($extendedNums[$i] == 0) {
                $zeroCount++;
            }
            if ($extendedNums[$i - $totalOnes] == 0) {
                $zeroCount--;
            }
            $minSwaps = min($minSwaps, $zeroCount);
        }

        return $minSwaps;

    }
}