<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDuplicates($nums) {
        $result = [];

        foreach ($nums as $num) {
            // Get the absolute value since we might have marked it negative
            $absNum = abs($num);
            $index = $absNum - 1; // Convert to 0-based index

            if ($nums[$index] < 0) {
                // If already negative, we found a duplicate
                $result[] = $absNum;
            } else {
                // Mark as visited by making it negative
                $nums[$index] = -$nums[$index];
            }
        }

        return $result;
    }
}