<?php

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function findComplement($num) {
        // Step 1: Get the binary representation of the number
        $binary = decbin($num);

        // Step 2: Flip the bits
        $flipped = '';
        for ($i = 0; $i < strlen($binary); $i++) {
            // If the bit is '1', change it to '0', otherwise change it to '1'
            $flipped .= $binary[$i] == '1' ? '0' : '1';
        }

        // Step 3: Convert the flipped binary string back to an integer
        return bindec($flipped);
    }
}