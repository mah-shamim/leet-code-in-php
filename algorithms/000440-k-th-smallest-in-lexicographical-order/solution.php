<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findKthNumber($n, $k) {
        $current = 1; // Start with '1'
        $k--; // Decrement k because we are starting with the first element

        while ($k > 0) {
            $steps = $this->calculateSteps($n, $current, $current + 1);

            if ($steps <= $k) {
                // If the k-th number is not in this prefix, move to the next prefix
                $current++;
                $k -= $steps; // Decrease k by the number of steps skipped
            } else {
                // If the k-th number is in this prefix, move deeper in this branch
                $current *= 10;
                $k--; // We are considering the current number itself
            }
        }

        return $current;
    }

    /**
     * Helper function to calculate the number of steps between two prefixes in the range [1, n]
     *
     * @param $n
     * @param $prefix1
     * @param $prefix2
     * @return int|mixed
     */
    function calculateSteps($n, $prefix1, $prefix2) {
        $steps = 0;

        while ($prefix1 <= $n) {
            $steps += min($n + 1, $prefix2) - $prefix1;
            $prefix1 *= 10;
            $prefix2 *= 10;
        }

        return $steps;
    }

}