<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function triangularSum($nums) {
        $n = count($nums);
        while ($n > 1) {
            for ($i = 0; $i < $n - 1; $i++) {
                $nums[$i] = ($nums[$i] + $nums[$i + 1]) % 10;
            }
            $n--;
        }
        return $nums[0];
    }
}