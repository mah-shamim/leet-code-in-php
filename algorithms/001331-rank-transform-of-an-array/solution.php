<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr) {
        // If the array is empty, return an empty array
        if (empty($arr)) {
            return [];
        }

        // Step 1: Copy the original array and sort it
        $sorted = $arr;
        sort($sorted);

        // Step 2: Use a hash map to store the rank of each element
        $rank = array();
        $current_rank = 1;

        foreach ($sorted as $value) {
            // Assign rank only if the element has not been assigned a rank yet
            if (!isset($rank[$value])) {
                $rank[$value] = $current_rank;
                $current_rank++;
            }
        }

        // Step 3: Replace elements in the original array with their ranks
        $result = array();
        foreach ($arr as $value) {
            $result[] = $rank[$value];
        }

        return $result;
    }
}