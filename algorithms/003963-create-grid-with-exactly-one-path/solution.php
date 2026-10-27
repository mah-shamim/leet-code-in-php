<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return String[]
     */
    function createGrid(int $m, int $n): array
    {
        $grid = [];

        for ($i = 0; $i < $m; $i++) {
            $row = '';
            for ($j = 0; $j < $n; $j++) {
                // Keep the top row and the rightmost column free.
                if ($i === 0 || $j === $n - 1) {
                    $row .= '.';
                } else {
                    $row .= '#';
                }
            }
            $grid[] = $row;
        }

        return $grid;
    }
}