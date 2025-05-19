<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return String
     */
    function triangleType($nums) {
        sort($nums);
        $a = $nums[0];
        $b = $nums[1];
        $c = $nums[2];

        if ($a + $b <= $c) {
            return "none";
        }

        if ($a == $b && $b == $c) {
            return "equilateral";
        } elseif ($a == $b || $b == $c || $a == $c) {
            return "isosceles";
        } else {
            return "scalene";
        }
    }
}