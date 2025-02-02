<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function check($nums) {
        $n = count($nums);
        $pivot = -1;

        // Find the pivot where the order drops
        for ($i = 0; $i < $n - 1; $i++) {
            if ($nums[$i] > $nums[$i + 1]) {
                $pivot = $i + 1;
                break;
            }
        }

        // If no pivot found, the array is already sorted
        if ($pivot == -1) {
            return true;
        }

        // Check if the array is sorted after the pivot
        for ($i = $pivot; $i < $n - 1; $i++) {
            if ($nums[$i] > $nums[$i + 1]) {
                return false;
            }
        }

        // Check if the last element is less than or equal to the first element
        if ($nums[$n - 1] > $nums[0]) {
            return false;
        }

        return true;
    }
}