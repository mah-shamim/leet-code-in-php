<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $n = count($height);
        if ($n == 0) return 0;

        $left = 0;
        $right = $n - 1;
        $left_max = 0;
        $right_max = 0;
        $water = 0;

        while ($left <= $right) {
            if ($height[$left] <= $height[$right]) {
                if ($height[$left] >= $left_max) {
                    $left_max = $height[$left];
                } else {
                    $water += $left_max - $height[$left];
                }
                $left++;
            } else {
                if ($height[$right] >= $right_max) {
                    $right_max = $height[$right];
                } else {
                    $water += $right_max - $height[$right];
                }
                $right--;
            }
        }

        return $water;

    }
}