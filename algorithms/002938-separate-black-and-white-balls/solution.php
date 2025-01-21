<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minimumSteps($s) {
        $n = strlen($s);
        $zeroCount = 0; // Tracks the number of '0's encountered
        $swaps = 0; // Tracks the minimum number of swaps needed

        // Iterate through the string from right to left
        for ($i = $n - 1; $i >= 0; $i--) {
            if ($s[$i] == '0') {
                // Increment the count of zeros when encountering '0'
                $zeroCount++;
            } elseif ($s[$i] == '1') {
                // When encountering '1', add the count of '0's to swaps
                $swaps += $zeroCount;
            }
        }

        return $swaps;
    }
}