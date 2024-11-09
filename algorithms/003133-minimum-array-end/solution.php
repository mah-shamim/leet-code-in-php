<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $x
     * @return Integer
     */
    function minEnd($n, $x) {
        // Calculate the maximum bit position to consider
        $kMaxBit = floor(log($n, 2)) + floor(log($x, 2)) + 2;
        $k = $n - 1;
        $ans = $x;
        $kBinaryIndex = 0;

        // Iterate through each bit position up to kMaxBit
        for ($i = 0; $i < $kMaxBit; ++$i) {
            // Check if the current bit in $ans is 0
            if ((($ans >> $i) & 1) == 0) {
                // Set the bit in $ans if the corresponding bit in $k is 1
                if (($k >> $kBinaryIndex) & 1) {
                    $ans |= (1 << $i);
                }
                ++$kBinaryIndex;
            }
        }

        return $ans;
    }
}