<?php

class Solution {

    /**
     * @param Integer $poured
     * @param Integer $query_row
     * @param Integer $query_glass
     * @return Float
     */
    function champagneTower(int $poured, int $query_row, int $query_glass): float
    {
        // Create a 2D array large enough for all rows up to 100 (0‑indexed)
        $tower = array_fill(0, 101, array_fill(0, 101, 0.0));

        // Pour all champagne into the top glass
        $tower[0][0] = $poured;

        // Simulate the flow row by row until we reach the query row
        for ($i = 0; $i < $query_row; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                // If this glass holds more than its capacity (1 cup)
                if ($tower[$i][$j] > 1.0) {
                    $excess = $tower[$i][$j] - 1.0;
                    $half = $excess / 2.0;
                    // Distribute equally to the two glasses below
                    $tower[$i + 1][$j]     += $half;
                    $tower[$i + 1][$j + 1] += $half;
                }
            }
        }

        // The amount in the requested glass cannot exceed its capacity
        return min(1.0, $tower[$query_row][$query_glass]);
    }
}