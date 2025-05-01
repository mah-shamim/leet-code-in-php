<?php

class Solution {

    /**
     * @param Integer[] $differences
     * @param Integer $lower
     * @param Integer $upper
     * @return Integer
     */
    function numberOfArrays($differences, $lower, $upper) {
        $current_sum = 0;
        $max_lower = $lower;
        $min_upper = $upper;

        foreach ($differences as $diff) {
            $current_sum += $diff;
            $lower_i = $lower - $current_sum;
            if ($lower_i > $max_lower) {
                $max_lower = $lower_i;
            }
            $upper_i = $upper - $current_sum;
            if ($upper_i < $min_upper) {
                $min_upper = $upper_i;
            }
        }

        if ($min_upper >= $max_lower) {
            return $min_upper - $max_lower + 1;
        } else {
            return 0;
        }
    }
}