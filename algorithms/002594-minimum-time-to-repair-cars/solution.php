<?php

class Solution {

    /**
     * @param Integer[] $ranks
     * @param Integer $cars
     * @return Integer
     */
    function repairCars($ranks, $cars) {
        $max_rank = max($ranks);
        $low = 1;
        $high = $max_rank * $cars * $cars;

        while ($low < $high) {
            $mid = (int)(($low + $high) / 2);
            $total = 0;
            foreach ($ranks as $r) {
                $t = $mid / $r;
                $n = (int)floor(sqrt($t));
                $total += $n;
            }
            if ($total >= $cars) {
                $high = $mid;
            } else {
                $low = $mid + 1;
            }
        }
        return $low;
    }
}