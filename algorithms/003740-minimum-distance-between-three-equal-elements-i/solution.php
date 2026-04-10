<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return float|int
     */
    function minimumDistance(array $nums): float|int
    {
        $positions = [];
        $n = count($nums);

        // Group indices by value
        for ($i = 0; $i < $n; $i++) {
            $positions[$nums[$i]][] = $i;
        }

        $minDistance = PHP_INT_MAX;

        // Check each value with at least 3 occurrences
        foreach ($positions as $indices) {
            $m = count($indices);
            if ($m < 3) continue;

            // Check all windows of 3 consecutive indices
            for ($i = 0; $i <= $m - 3; $i++) {
                $first = $indices[$i];
                $last = $indices[$i + 2];
                $distance = 2 * ($last - $first);
                if ($distance < $minDistance) {
                    $minDistance = $distance;
                }
            }
        }

        return ($minDistance == PHP_INT_MAX) ? -1 : $minDistance;
    }
}