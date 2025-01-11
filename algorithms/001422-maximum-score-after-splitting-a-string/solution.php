<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxScore($s) {
        $n = strlen($s);

        // Step 1: Precompute the number of ones up to each index
        $prefixOneCount = array_fill(0, $n, 0);
        $onesCount = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '1') {
                $onesCount++;
            }
            $prefixOneCount[$i] = $onesCount;
        }

        // Step 2: Iterate over the string and calculate the score
        $maxScore = 0;
        $zeroCountLeft = 0;

        // Iterate to find the maximum score for all possible splits
        for ($i = 0; $i < $n - 1; $i++) { // We need at least one character on the right
            if ($s[$i] == '0') {
                $zeroCountLeft++;
            }

            // Right substring ones count
            $oneCountRight = $onesCount - $prefixOneCount[$i];

            // Calculate score for this split
            $score = $zeroCountLeft + $oneCountRight;
            $maxScore = max($maxScore, $score);
        }

        return $maxScore;
    }
}