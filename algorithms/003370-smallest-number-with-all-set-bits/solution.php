<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function smallestNumber($n) {
        // If n is already all 1s, return it
        if (($n & ($n + 1)) == 0) {
            return $n;
        }

        // Find the bit length of n
        $bitLength = 0;
        $temp = $n;
        while ($temp > 0) {
            $bitLength++;
            $temp >>= 1;
        }

        // Return the next number with all bits set
        return (1 << $bitLength) - 1;
    }
}