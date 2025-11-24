<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean[]
     */
    function prefixesDivBy5($nums) {
        $current = 0;
        $result = [];
        foreach ($nums as $bit) {
            $current = ($current * 2 + $bit) % 5;
            $result[] = $current === 0;
        }
        return $result;
    }
}