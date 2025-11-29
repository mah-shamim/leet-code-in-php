<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums, $k) {
        $total = array_sum($nums);
        $remainder = $total % $k;
        return $remainder;
    }
}