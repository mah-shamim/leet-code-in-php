<?php

class Solution {

    /**
     * @param Integer $start
     * @param Integer $goal
     * @return Integer
     */
    function minBitFlips($start, $goal) {
        // Step 1: XOR start and goal to find the differing bits
        $xor = $start ^ $goal;

        // Step 2: Count the number of 1's in the binary representation of xor
        $bitFlips = 0;
        while ($xor > 0) {
            // Increment count if the last bit is 1
            $bitFlips += $xor & 1;
            // Shift xor to the right by 1 bit
            $xor >>= 1;
        }

        return $bitFlips;

    }
}