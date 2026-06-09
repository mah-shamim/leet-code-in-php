<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return float|int
     */
    function maxTotalValue(array $nums, int $k): float|int
    {
        $min = min($nums);
        $max = max($nums);
        return $k * ($max - $min);
    }
}