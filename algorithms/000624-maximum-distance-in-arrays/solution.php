<?php

class Solution {

    /**
     * @param Integer[][] $arrays
     * @return Integer
     */
    function maxDistance($arrays) {
        $min_value = $arrays[0][0];
        $max_value = end($arrays[0]);
        $max_distance = 0;

        for ($i = 1; $i < count($arrays); $i++) {
            $current_min = $arrays[$i][0];
            $current_max = end($arrays[$i]);

            // Calculate distance with the current min and global max
            $max_distance = max($max_distance, abs($current_max - $min_value));

            // Calculate distance with the current max and global min
            $max_distance = max($max_distance, abs($max_value - $current_min));

            // Update global min and max
            $min_value = min($min_value, $current_min);
            $max_value = max($max_value, $current_max);
        }

        return $max_distance;
    }
}