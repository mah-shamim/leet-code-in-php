<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function applyOperations($nums) {
        $n = count($nums);
        for ($i = 0; $i < $n - 1; $i++) {
            if ($nums[$i] == $nums[$i + 1]) {
                $nums[$i] *= 2;
                $nums[$i + 1] = 0;
            }
        }
        $nonZeros = array();
        foreach ($nums as $num) {
            if ($num != 0) {
                array_push($nonZeros, $num);
            }
        }
        $zeroCount = $n - count($nonZeros);
        for ($i = 0; $i < $zeroCount; $i++) {
            array_push($nonZeros, 0);
        }
        return $nonZeros;
    }
}