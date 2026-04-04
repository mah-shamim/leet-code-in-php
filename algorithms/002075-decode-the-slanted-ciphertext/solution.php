<?php

class Solution {

    /**
     * @param String $encodedText
     * @param Integer $rows
     * @return String
     */
    function decodeCiphertext(string $encodedText, int $rows): string
    {
        $result = '';

        // Calculate number of columns in the matrix
        $columns = strlen($encodedText) / $rows;

        // Traverse each diagonal starting from the first row
        // Each diagonal starts at position (0, j) where j is the starting column
        for ($startCol = 0; $startCol < $columns; $startCol++) {
            // Traverse the diagonal from (0, startCol) going down-right
            // row increases by 1, column increases by 1 for each step
            $row = 0;
            $col = $startCol;

            while ($row < $rows && $col < $columns) {
                // Convert 2D coordinates (row, col) to 1D index in the string
                // Index formula: row * columns + col
                $index = $row * $columns + $col;
                $result .= $encodedText[$index];

                // Move to next position in the diagonal
                $row++;
                $col++;
            }
        }

        // Remove trailing spaces from the decoded message
        $result = rtrim($result);

        return $result;
    }
}