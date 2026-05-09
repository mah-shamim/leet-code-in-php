<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer[][]
     */
    function rotateGrid(array $grid, int $k): array
    {
        $m = count($grid);
        $n = count($grid[0]);

        // Number of layers
        $layers = min($m, $n) / 2;

        for ($layer = 0; $layer < $layers; $layer++) {

            $elements = [];

            $top = $layer;
            $left = $layer;
            $bottom = $m - $layer - 1;
            $right = $n - $layer - 1;

            // -------------------------
            // Extract layer elements
            // -------------------------

            // Top row
            for ($j = $left; $j <= $right; $j++) {
                $elements[] = $grid[$top][$j];
            }

            // Right column
            for ($i = $top + 1; $i <= $bottom - 1; $i++) {
                $elements[] = $grid[$i][$right];
            }

            // Bottom row
            for ($j = $right; $j >= $left; $j--) {
                $elements[] = $grid[$bottom][$j];
            }

            // Left column
            for ($i = $bottom - 1; $i >= $top + 1; $i--) {
                $elements[] = $grid[$i][$left];
            }

            $len = count($elements);

            // Effective rotations
            $rot = $k % $len;

            // Counter-clockwise rotation
            $rotated = array_merge(
                array_slice($elements, $rot),
                array_slice($elements, 0, $rot)
            );

            $idx = 0;

            // -------------------------
            // Put rotated values back
            // -------------------------

            // Top row
            for ($j = $left; $j <= $right; $j++) {
                $grid[$top][$j] = $rotated[$idx++];
            }

            // Right column
            for ($i = $top + 1; $i <= $bottom - 1; $i++) {
                $grid[$i][$right] = $rotated[$idx++];
            }

            // Bottom row
            for ($j = $right; $j >= $left; $j--) {
                $grid[$bottom][$j] = $rotated[$idx++];
            }

            // Left column
            for ($i = $bottom - 1; $i >= $top + 1; $i--) {
                $grid[$i][$left] = $rotated[$idx++];
            }
        }

        return $grid;
    }
}