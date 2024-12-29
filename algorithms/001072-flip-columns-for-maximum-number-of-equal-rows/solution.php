<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function maxEqualRowsAfterFlips($matrix) {
        $rowCount = count($matrix);
        $colCount = count($matrix[0]);
        $patternCounts = [];

        foreach ($matrix as $row) {
            // Create a string representation of the row and its complement
            $pattern = implode('', $row);
            $complement = '';
            foreach ($row as $bit) {
                $complement .= $bit ^ 1; // Flip the bit
            }

            // Count occurrences of patterns and complements
            if (!isset($patternCounts[$pattern])) {
                $patternCounts[$pattern] = 0;
            }
            $patternCounts[$pattern]++;

            if (!isset($patternCounts[$complement])) {
                $patternCounts[$complement] = 0;
            }
            $patternCounts[$complement]++;
        }

        // Find the maximum count
        $maxEqualRows = 0;
        foreach ($patternCounts as $count) {
            $maxEqualRows = max($maxEqualRows, $count);
        }

        return $maxEqualRows;
    }
}