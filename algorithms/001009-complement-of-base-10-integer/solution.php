<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function bitwiseComplement(int $n): int
    {
        // Special case: n == 0 -> complement is 1
        if ($n == 0) {
            return 1;
        }

        // Compute the bit length of n
        $bitLength = floor(log($n, 2)) + 1;

        // Create a mask with all bits set to 1 of the same length
        $mask = (1 << $bitLength) - 1;

        // XOR with mask flips all bits
        return $n ^ $mask;
    }
}