<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $m
     * @param Integer[] $hBars
     * @param Integer[] $vBars
     * @return Integer
     */
    function maximizeSquareHoleArea(int $n, int $m, array $hBars, array $vBars): int
    {
        // Sort both arrays
        sort($hBars);
        sort($vBars);

        // Find longest consecutive sequence in hBars
        $hMax = 1;
        $current = 1;
        for ($i = 1; $i < count($hBars); $i++) {
            if ($hBars[$i] == $hBars[$i - 1] + 1) {
                $current++;
                $hMax = max($hMax, $current);
            } else {
                $current = 1;
            }
        }

        // Find longest consecutive sequence in vBars
        $vMax = 1;
        $current = 1;
        for ($i = 1; $i < count($vBars); $i++) {
            if ($vBars[$i] == $vBars[$i - 1] + 1) {
                $current++;
                $vMax = max($vMax, $current);
            } else {
                $current = 1;
            }
        }

        // Calculate maximum square side length
        // Formula: max_consecutive + 1
        $side = min($hMax + 1, $vMax + 1);

        // Return area
        return $side * $side;
    }
}