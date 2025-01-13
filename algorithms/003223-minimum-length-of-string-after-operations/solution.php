<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minimumLength($s) {
        // Step 1: Count the frequency of each character
        $frequency = array();
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $char = $s[$i];
            if (!isset($frequency[$char])) {
                $frequency[$char] = 0;
            }
            $frequency[$char]++;
        }

        // Step 2: Reduce frequency of characters with count >= 3
        foreach ($frequency as $char => $count) {
            if ($count >= 3) {
                // Remove pairs of characters
                $frequency[$char] = $count % 2 == 0 ? 2 : 1;
            }
        }

        // Step 3: Calculate the minimum length
        $minLength = 0;
        foreach ($frequency as $count) {
            $minLength += $count;
        }

        return $minLength;
    }
}