<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countTriples($n) {
        $count = 0;

        // Create a set of all squares for quick lookup
        $squareSet = [];
        for ($i = 1; $i <= $n; $i++) {
            $squareSet[$i * $i] = true;
        }

        // Iterate through unique pairs
        for ($a = 1; $a <= $n; $a++) {
            $aSquare = $a * $a;
            for ($b = $a; $b <= $n; $b++) {
                $sum = $aSquare + $b * $b;

                if (isset($squareSet[$sum])) {
                    // If a == b, only one permutation: (a, b, c)
                    // If a != b, two permutations: (a, b, c) and (b, a, c)
                    $count += ($a == $b) ? 1 : 2;
                }
            }
        }

        return $count;
    }
}