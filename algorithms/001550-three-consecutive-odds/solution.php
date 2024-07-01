<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function threeConsecutiveOdds($arr) {
        // Iterate through the array, checking each triplet
        for ($i = 0; $i < count($arr) - 2; $i++) {
            // Check if the current number and the next two numbers are odd
            if ($arr[$i] % 2 != 0 && $arr[$i + 1] % 2 != 0 && $arr[$i + 2] % 2 != 0) {
                // If all three are odd, return true
                return true;
            }
        }
        // If no such triplet is found, return false
        return false;
    }
}