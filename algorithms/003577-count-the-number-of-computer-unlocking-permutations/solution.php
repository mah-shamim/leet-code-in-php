<?php

class Solution {

    /**
     * @param Integer[] $complexity
     * @return Integer
     */
    function countPermutations($complexity) {
        $n = count($complexity);
        $first = $complexity[0];

        // Check if any other computer has complexity <= first
        for ($i = 1; $i < $n; $i++) {
            if ($complexity[$i] <= $first) {
                return 0;
            }
        }

        $mod = 1000000007;
        $fact = 1;
        // Compute (n-1)! modulo MOD
        for ($i = 2; $i <= $n - 1; $i++) {
            $fact = ($fact * $i) % $mod;
        }
        return $fact;
    }
}