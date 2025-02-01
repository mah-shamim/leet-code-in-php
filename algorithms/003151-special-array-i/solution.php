<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isArraySpecial($nums) {
        $length = count($nums);

        // If there is only one element, it's automatically a special array.
        if ($length === 1) {
            return true;
        }

        // Check each adjacent pair for different parity
        for ($i = 1; $i < $length; $i++) {
            if (($nums[$i] % 2) === ($nums[$i - 1] % 2)) {
                // If two consecutive elements have the same parity, return false
                return false;
            }
        }

        // If all pairs have different parity, return true
        return true;
    }
}