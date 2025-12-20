<?php

class Solution {

    /**
     * @param String[] $strs
     * @return Integer
     */
    function minDeletionSize($strs) {
        $rows = count($strs);
        $cols = strlen($strs[0]);
        $deleted = 0;

        // Check each column
        for ($col = 0; $col < $cols; $col++) {
            // Check if column is sorted
            for ($row = 1; $row < $rows; $row++) {
                if ($strs[$row][$col] < $strs[$row - 1][$col]) {
                    $deleted++;
                    break; // No need to check further in this column
                }
            }
        }

        return $deleted;
    }
}