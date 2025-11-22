<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumOperations($nums) {
        $operations = 0;

        foreach ($nums as $num) {
            $remainder = $num % 3;
            $operations += min($remainder, 3 - $remainder);
        }

        return $operations;
    }
}