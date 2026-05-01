<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return float|int
     */
    function maxRotateFunction(array $nums): float|int
    {
        $n = count($nums);
        if ($n == 1) return 0;

        $sum = array_sum($nums);
        $f = 0;
        for ($i = 0; $i < $n; $i++) {
            $f += $i * $nums[$i];
        }

        $maxF = $f;

        for ($k = 0; $k < $n - 1; $k++) {
            $f = $f + $sum - $n * $nums[$n - $k - 1];
            if ($f > $maxF) {
                $maxF = $f;
            }
        }

        return $maxF;
    }
}