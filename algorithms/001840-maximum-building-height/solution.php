<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $restrictions
     * @return Integer
     */
    function maxBuilding(int $n, array $restrictions): int
    {
        // Add first building restriction (height = 0)
        $restrictions[] = [1, 0];

        // Sort restrictions by building id
        usort($restrictions, function($a, $b) {
            return $a[0] - $b[0];
        });

        $m = count($restrictions);

        // Left to right pass: enforce max possible height from left side
        for ($i = 1; $i < $m; $i++) {
            $id1 = $restrictions[$i-1][0];
            $h1 = $restrictions[$i-1][1];
            $id2 = $restrictions[$i][0];
            $h2 = $restrictions[$i][1];

            // Max possible height at id2 given id1 restriction
            $restrictions[$i][1] = min($h2, $h1 + ($id2 - $id1));
        }

        // Right to left pass: enforce max possible height from right side
        for ($i = $m - 2; $i >= 0; $i--) {
            $id1 = $restrictions[$i][0];
            $h1 = $restrictions[$i][1];
            $id2 = $restrictions[$i+1][0];
            $h2 = $restrictions[$i+1][1];

            $restrictions[$i][1] = min($h1, $h2 + ($id2 - $id1));
        }

        $maxHeight = 0;

        // Calculate max height between each pair of restrictions
        for ($i = 0; $i < $m - 1; $i++) {
            $id1 = $restrictions[$i][0];
            $h1 = $restrictions[$i][1];
            $id2 = $restrictions[$i+1][0];
            $h2 = $restrictions[$i+1][1];

            $distance = $id2 - $id1;

            // Max height we can reach between these two points
            $possibleMax = max($h1, $h2) + floor(($distance - abs($h2 - $h1)) / 2);
            $maxHeight = max($maxHeight, $possibleMax);
        }

        // Check from last restriction to building n
        $lastId = $restrictions[$m-1][0];
        $lastHeight = $restrictions[$m-1][1];
        $maxHeight = max($maxHeight, $lastHeight + ($n - $lastId));

        return $maxHeight;
    }
}