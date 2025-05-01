<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumTripletValue($nums) {
        $len = count($nums);
        if ($len < 3) return 0; // According to constraints, len >=3, but added for safety

        $max_right = array_fill(0, $len, 0);
        for ($j = $len - 2; $j >= 0; $j--) {
            $max_right[$j] = max($nums[$j + 1], $max_right[$j + 1]);
        }

        $max_val = PHP_INT_MIN;
        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = $i + 1; $j < $len - 1; $j++) {
                $current = ($nums[$i] - $nums[$j]) * $max_right[$j];
                if ($current > $max_val) {
                    $max_val = $current;
                }
            }
        }

        return $max_val > 0 ? $max_val : 0;
    }
}