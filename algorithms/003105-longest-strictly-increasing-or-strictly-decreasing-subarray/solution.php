<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestMonotonicSubarray(array $nums): int
    {
        $n = count($nums);
        if ($n == 0) return 0;

        $inc = 1;
        $dec = 1;
        $ans = 1;

        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] > $nums[$i - 1]) {
                $inc++;
                $dec = 1;
            } elseif ($nums[$i] < $nums[$i - 1]) {
                $dec++;
                $inc = 1;
            } else {
                // Equal elements break both strict increasing and decreasing runs.
                $inc = 1;
                $dec = 1;
            }

            $ans = max($ans, $inc, $dec);
        }

        return $ans;
    }
}