<?php

class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $k
     * @return Integer
     */
    function maximumCandies($candies, $k) {
        $sum = array_sum($candies);
        if ($sum < $k) {
            return 0;
        }

        $left = 1;
        $right = max($candies);
        $ans = 0;

        while ($left <= $right) {
            $mid = $left + intdiv(($right - $left), 2);
            $total = 0;
            foreach ($candies as $c) {
                $total += intdiv($c, $mid);
                if ($total >= $k) {
                    break;
                }
            }
            if ($total >= $k) {
                $ans = $mid;
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $ans;
    }
}