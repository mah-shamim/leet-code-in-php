<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function subsetXORSum($nums) {
        return array_reduce($nums, function($carry, $item) {
                return $carry | $item;
            }) << (count($nums) - 1);
    }
}