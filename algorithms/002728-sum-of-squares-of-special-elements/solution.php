<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumOfSquares(array $nums): int
    {
        $n = count($nums);
        $sum = 0;

        // The problem uses 1-indexed positions.
        for ($i = 1; $i <= $n; $i++) {
            if ($n % $i == 0) {
                $value = $nums[$i - 1];
                $sum += $value * $value;
            }
        }

        return $sum;
    }
}