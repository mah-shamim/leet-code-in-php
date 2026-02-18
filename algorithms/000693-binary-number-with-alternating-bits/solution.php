<?php

class Solution {

    /**
     * Check if the binary representation of a positive integer has alternating bits.
     *
     * @param Integer $n
     * @return Boolean
     */
    function hasAlternatingBits(int $n): bool
    {
        // Compute XOR of n and n shifted right by 1.
        // For alternating bits, every adjacent pair differs, so the result will have
        // all bits set to 1 from the most significant bit down to bit 0.
        $x = $n ^ ($n >> 1);

        // Check if $x is of the form 111...111 (all ones).
        // Such a number has the property that $x & ($x + 1) == 0,
        // because adding 1 turns it into a power of two.
        return ($x & ($x + 1)) == 0;
    }
}