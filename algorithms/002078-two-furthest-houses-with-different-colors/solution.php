<?php

class Solution {

    /**
     * @param Integer[] $colors
     * @return Integer
     */
    function maxDistance(array $colors): int
    {
        $n = count($colors);

        // Case 1: Start from leftmost house (index 0)
        $maxDist = 0;
        for ($i = $n - 1; $i > 0; $i--) {
            if ($colors[$i] != $colors[0]) {
                $maxDist = max($maxDist, $i - 0);
                break;
            }
        }

        // Case 2: Start from rightmost house (index n-1)
        for ($i = 0; $i < $n - 1; $i++) {
            if ($colors[$i] != $colors[$n - 1]) {
                $maxDist = max($maxDist, ($n - 1) - $i);
                break;
            }
        }

        return $maxDist;
    }
}