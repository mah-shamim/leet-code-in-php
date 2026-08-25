<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function missingMultiple(array $nums, int $k): int
    {
        $set = array_flip($nums);
        $multiple = $k;
        while (isset($set[$multiple])) {
            $multiple += $k;
        }
        return $multiple;
    }
}