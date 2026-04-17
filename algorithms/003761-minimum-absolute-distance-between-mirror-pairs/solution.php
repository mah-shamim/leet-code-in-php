<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMirrorPairDistance(array $nums): int
    {
        $map = []; // Stores the latest index for a given number
        $minDistance = PHP_INT_MAX;

        for ($i = 0; $i < count($nums); $i++) {
            $rev = (int) strrev((string) $nums[$i]); // reverse digits

            // If we've seen this number before, it's a mirror pair with some previous number
            if (isset($map[$nums[$i]])) {
                $minDistance = min($minDistance, $i - $map[$nums[$i]]);
            }

            // Store the current index for the reversed number
            $map[$rev] = $i;
        }

        return $minDistance == PHP_INT_MAX ? -1 : $minDistance;
    }
}