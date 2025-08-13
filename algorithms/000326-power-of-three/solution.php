<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfThree($n) {
        if ($n <= 0) {
            return false;
        }
        $max_power_three = 1162261467;
        return ($max_power_three % $n == 0);
    }
}