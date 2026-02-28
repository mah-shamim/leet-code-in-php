<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function concatenatedBinary(int $n): int
    {
        $mod = 1000000007;
        $result = 0;
        $len = 1;          // current bit length
        $nextPower = 2;    // next number where length increases (2,4,8,...)

        for ($i = 1; $i <= $n; $i++) {
            // update bit length when i reaches a power of two
            if ($i == $nextPower) {
                $len++;
                $nextPower <<= 1;  // double the threshold
            }

            // shift = 2^len (mod M)
            $shift = (1 << $len) % $mod;

            // append i to the concatenated value
            $result = (($result * $shift) % $mod + $i) % $mod;
        }

        return $result;
    }
}