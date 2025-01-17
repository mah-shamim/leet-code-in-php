<?php

class Solution {

    /**
     * @param String $start
     * @param String $target
     * @return Boolean
     */
    function canChange($start, $target) {
        $n = strlen($start);

        // Step 1: Remove `_` from both strings and compare
        $startNoUnderscore = str_replace('_', '', $start);
        $targetNoUnderscore = str_replace('_', '', $target);

        if ($startNoUnderscore !== $targetNoUnderscore) {
            return false;
        }

        // Step 2: Two-pointer traversal
        $i = $j = 0;
        while ($i < $n && $j < $n) {
            // Move pointers to next non-underscore character
            while ($i < $n && $start[$i] === '_') $i++;
            while ($j < $n && $target[$j] === '_') $j++;

            // If one pointer reaches the end but the other doesn't
            if ($i < $n && $j < $n) {
                // Check for mismatched positions
                if ($start[$i] !== $target[$j]) return false;

                // `L` should only move left; `R` should only move right
                if (($start[$i] === 'L' && $i < $j) || ($start[$i] === 'R' && $i > $j)) {
                    return false;
                }
            }

            $i++;
            $j++;
        }

        return true;
    }
}