<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function maximumElementAfterDecrementingAndRearranging(array $arr): int
    {
        sort($arr);
        $arr[0] = 1;
        for ($i = 1; $i < count($arr); $i++) {
            $arr[$i] = min($arr[$i], $arr[$i-1] + 1);
        }
        return end($arr);
    }
}