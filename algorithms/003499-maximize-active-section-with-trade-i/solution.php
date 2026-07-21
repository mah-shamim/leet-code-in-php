<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxActiveSectionsAfterTrade(string $s): int
    {
        $zeroGroups = [];
        $maxZeroMerge = 0;
        $n = strlen($s);

        // Collect lengths of consecutive zero groups
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '0') {
                if ($i > 0 && $s[$i - 1] == '0') {
                    // Extend the last zero group
                    $zeroGroups[count($zeroGroups) - 1]++;
                } else {
                    // Start a new zero group
                    $zeroGroups[] = 1;
                }
            }
        }

        // Check pairs of adjacent zero groups
        for ($i = 0; $i < count($zeroGroups) - 1; $i++) {
            $maxZeroMerge = max($maxZeroMerge, $zeroGroups[$i] + $zeroGroups[$i + 1]);
        }

        // Count total ones in the original string
        $totalOnes = substr_count($s, '1');

        return $totalOnes + $maxZeroMerge;
    }
}