<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer $k
     * @return Boolean
     */
    function areSimilar(array $mat, int $k): bool
    {
        $m = count($mat);
        $n = count($mat[0]);

        // Reduce k modulo n, because after n shifts the matrix returns to original
        $k %= $n;

        // If k == 0, the matrix is unchanged after k steps
        if ($k == 0) {
            return true;
        }

        // Check each row for invariance under a cyclic shift by k
        for ($i = 0; $i < $m; $i++) {
            $row = $mat[$i];
            for ($j = 0; $j < $n; $j++) {
                // The element at position j should equal the element at (j + k) mod n
                // for the row to be unchanged after a left shift by k (or right shift by k)
                if ($row[$j] != $row[($j + $k) % $n]) {
                    return false;
                }
            }
        }

        return true;
    }
}