<?php

class Solution {

    /**
     * @param String $corridor
     * @return Integer
     */
    function numberOfWays($corridor) {
        $MOD = 1000000007;
        $n = strlen($corridor);

        // Collect all seat indices
        $seatIndices = [];
        for ($i = 0; $i < $n; $i++) {
            if ($corridor[$i] === 'S') {
                $seatIndices[] = $i;
            }
        }

        $seatCount = count($seatIndices);

        // If no seats or odd number of seats, no valid division
        if ($seatCount === 0 || $seatCount % 2 !== 0) {
            return 0;
        }

        $ways = 1;

        // For each gap between sections
        for ($i = 2; $i < $seatCount; $i += 2) {
            // Number of positions for divider between sections
            $gap = $seatIndices[$i] - $seatIndices[$i - 1];
            $ways = ($ways * $gap) % $MOD;
        }

        return $ways;
    }
}