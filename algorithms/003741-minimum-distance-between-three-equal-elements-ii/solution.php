<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return float|int
     */
    function minimumDistance(array $nums): float|int
    {
        $positions = [];

        // Group indices by value
        foreach ($nums as $index => $value) {
            $positions[$value][] = $index;
        }

        $minDistance = PHP_INT_MAX;

        foreach ($positions as $indices) {
            $m = count($indices);
            if ($m < 3) continue;

            // Slide window of size 3
            for ($i = 0; $i <= $m - 3; $i++) {
                $p = $indices[$i];
                $r = $indices[$i + 2];
                $minDistance = min($minDistance, $r - $p);
            }
        }

        return $minDistance === PHP_INT_MAX ? -1 : 2 * $minDistance;
    }
}