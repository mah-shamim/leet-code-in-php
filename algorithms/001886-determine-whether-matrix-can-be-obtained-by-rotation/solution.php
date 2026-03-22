<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer[][] $target
     * @return Boolean
     */
    function findRotation(array $mat, array $target): bool
    {
        // Check 0° rotation
        if ($mat == $target) return true;

        // Rotate 90°, 180°, 270° and compare
        $rotated = $this->rotate90($mat);
        if ($rotated == $target) return true;

        $rotated = $this->rotate90($rotated);
        if ($rotated == $target) return true;

        $rotated = $this->rotate90($rotated);
        if ($rotated == $target) return true;

        return false;
    }

    /**
     * Rotates an n x n matrix 90 degrees clockwise.
     *
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function rotate90(array $matrix): array
    {
        $n = count($matrix);
        $rotated = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $rotated[$j][$n - 1 - $i] = $matrix[$i][$j];
            }
        }
        return $rotated;
    }
}