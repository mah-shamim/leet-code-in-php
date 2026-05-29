<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minElement(array $nums): int
    {
        $min = PHP_INT_MAX;

        foreach ($nums as $num) {
            $sum = 0;
            while ($num > 0) {
                $sum += $num % 10;
                $num = intdiv($num, 10);
            }
            if ($sum < $min) {
                $min = $sum;
            }
        }

        return $min;
    }
}