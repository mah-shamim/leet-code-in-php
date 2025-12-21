<?php

class Solution {

    /**
     * @param String[] $strs
     * @return Integer
     */
    function minDeletionSize($strs) {
        $n = count($strs);
        $len = strlen($strs[0]);
        $sorted = array_fill(0, $n - 1, false);
        $deletions = 0;

        for ($col = 0; $col < $len; $col++) {
            $valid = true;
            // Check if current column causes any violation
            for ($i = 0; $i < $n - 1; $i++) {
                if (!$sorted[$i] && $strs[$i][$col] > $strs[$i + 1][$col]) {
                    $valid = false;
                    break;
                }
            }

            if (!$valid) {
                $deletions++;
            } else {
                // Update sorted status for pairs that become sorted by this column
                for ($i = 0; $i < $n - 1; $i++) {
                    if (!$sorted[$i] && $strs[$i][$col] < $strs[$i + 1][$col]) {
                        $sorted[$i] = true;
                    }
                }
            }
        }

        return $deletions;
    }
}