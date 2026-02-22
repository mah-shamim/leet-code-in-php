<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function binaryGap(int $n): int
    {
        // Convert the integer to its binary string representation
        $binary = decbin($n);
        $length = strlen($binary);
        $maxGap = 0;
        $previousIndex = -1;

        // Traverse the binary string from left (MSB) to right (LSB)
        for ($i = 0; $i < $length; $i++) {
            if ($binary[$i] == '1') {
                // If this is not the first '1' we've seen
                if ($previousIndex != -1) {
                    // Calculate the distance and update the maximum gap
                    $distance = $i - $previousIndex;
                    if ($distance > $maxGap) {
                        $maxGap = $distance;
                    }
                }
                // Update the position of the last seen '1'
                $previousIndex = $i;
            }
        }

        return $maxGap;
    }
}