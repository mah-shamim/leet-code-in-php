<?php

class Solution {

    /**
     * @param Integer[] $candidates
     * @return Integer
     */
    function largestCombination($candidates) {
        $maxCombinationSize = 0;

        // We only need to check up to 24 bits due to the constraint of the input numbers.
        for ($bit = 0; $bit < 24; $bit++) {
            $count = 0;

            // Count how many numbers have the current bit set.
            foreach ($candidates as $num) {
                if (($num & (1 << $bit)) != 0) {
                    $count++;
                }
            }

            // Track the maximum count across all bit positions.
            $maxCombinationSize = max($maxCombinationSize, $count);
        }

        return $maxCombinationSize;
    }
}