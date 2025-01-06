<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $multiplier
     * @return Integer[]
     */
    function getFinalState($nums, $k, $multiplier) {
        for ($i = 0; $i < $k; $i++) {
            // Find the minimum value and its first occurrence index
            $minIndex = 0;
            $minValue = $nums[0];
            for ($j = 1; $j < count($nums); $j++) {
                if ($nums[$j] < $minValue) {
                    $minValue = $nums[$j];
                    $minIndex = $j;
                }
            }

            // Multiply the minimum value by the multiplier
            $nums[$minIndex] *= $multiplier;
        }
        return $nums;
    }
}