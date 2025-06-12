<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAdjacentDistance($nums) {
        $n = count($nums);
        $max_diff = 0;
        for ($i = 0; $i < $n; $i++) {
            $j = ($i + 1) % $n;
            $diff = abs($nums[$i] - $nums[$j]);
            if ($diff > $max_diff) {
                $max_diff = $diff;
            }
        }
        return $max_diff;
    }
}
