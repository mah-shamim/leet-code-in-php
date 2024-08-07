<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations(array $nums, int $k): int
    {
        $xors = array_reduce($nums, function($carry, $item) {
            return $carry ^ $item;
        }, 0);
        return substr_count(decbin($k ^ $xors), '1');
    }
}