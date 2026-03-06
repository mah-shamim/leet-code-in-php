<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkOnesSegment(string $s): bool
    {
        // Find the first zero
        $firstZero = strpos($s, '0');

        // If no zero, all are ones -> only one segment
        if ($firstZero === false) {
            return true;
        }

        // Look for any '1' after the first zero
        $oneAfterZero = strpos($s, '1', $firstZero + 1);

        // If a '1' is found after a zero, there are multiple segments
        return $oneAfterZero === false;
    }
}