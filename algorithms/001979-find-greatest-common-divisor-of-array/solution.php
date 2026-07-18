<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findGCD(array $nums): int
    {
        $min = min($nums);
        $max = max($nums);

        for ($i = $min; $i >= 1; $i--) {
            if ($min % $i == 0 && $max % $i == 0) {
                return $i;
            }
        }
        return 1;
    }
}