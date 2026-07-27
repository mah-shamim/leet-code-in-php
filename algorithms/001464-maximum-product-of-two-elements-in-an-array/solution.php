<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct(array $nums): int
    {
        $max1 = $max2 = PHP_INT_MIN;

        foreach ($nums as $num) {
            if ($num > $max1) {
                $max2 = $max1;
                $max1 = $num;
            } elseif ($num > $max2) {
                $max2 = $num;
            }
        }

        return ($max1 - 1) * ($max2 - 1);
    }
}