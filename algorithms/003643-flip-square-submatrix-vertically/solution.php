<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $x
     * @param Integer $y
     * @param Integer $k
     * @return Integer[][]
     */
    function reverseSubmatrix(array $grid, int $x, int $y, int $k): array
    {
        $top = $x;
        $bottom = $x + $k - 1;

        while ($top < $bottom) {
            // Swap the rows $top and $bottom within the k columns
            for ($col = $y; $col < $y + $k; $col++) {
                $temp = $grid[$top][$col];
                $grid[$top][$col] = $grid[$bottom][$col];
                $grid[$bottom][$col] = $temp;
            }
            $top++;
            $bottom--;
        }

        return $grid;
    }
}