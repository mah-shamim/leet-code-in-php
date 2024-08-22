<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minimumDeletions($s) {
        $n = strlen($s);

        // Preprocess the counts of 'b's up to each index
        $prefixB = array_fill(0, $n, 0);
        $prefixB[0] = $s[0] == 'b' ? 1 : 0;
        for ($i = 1; $i < $n; $i++) {
            $prefixB[$i] = $prefixB[$i - 1] + ($s[$i] == 'b' ? 1 : 0);
        }

        // Preprocess the counts of 'a's from each index
        $suffixA = array_fill(0, $n, 0);
        $suffixA[$n - 1] = $s[$n - 1] == 'a' ? 1 : 0;
        for ($i = $n - 2; $i >= 0; $i--) {
            $suffixA[$i] = $suffixA[$i + 1] + ($s[$i] == 'a' ? 1 : 0);
        }

        // Calculate the minimum deletions needed
        $minDeletions = PHP_INT_MAX;
        for ($i = 0; $i < $n; $i++) {
            $deletions = ($i > 0 ? $prefixB[$i - 1] : 0) + ($i < $n - 1 ? $suffixA[$i + 1] : 0);
            $minDeletions = min($minDeletions, $deletions);
        }

        return $minDeletions;
    }
}