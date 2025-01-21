<?php

class Solution {

    /**
     * @param String[][] $box
     * @return String[][]
     */
    function rotateTheBox($box) {
        $m = count($box); // Number of rows
        $n = count($box[0]); // Number of columns

        // Step 1: Apply gravity to each row
        for ($i = 0; $i < $m; $i++) {
            $emptySlot = $n - 1; // Index of the empty slot in the current row
            for ($j = $n - 1; $j >= 0; $j--) {
                if ($box[$i][$j] === '#') {
                    // Move stone to the lowest possible position
                    $box[$i][$j] = '.';
                    $box[$i][$emptySlot] = '#';
                    $emptySlot--;
                } elseif ($box[$i][$j] === '*') {
                    // Reset emptySlot to just above the obstacle
                    $emptySlot = $j - 1;
                }
            }
        }

        // Step 2: Rotate the box 90 degrees clockwise
        $rotatedBox = [];
        for ($j = 0; $j < $n; $j++) {
            $newRow = [];
            for ($i = $m - 1; $i >= 0; $i--) {
                $newRow[] = $box[$i][$j];
            }
            $rotatedBox[] = $newRow;
        }

        return $rotatedBox;
    }
}