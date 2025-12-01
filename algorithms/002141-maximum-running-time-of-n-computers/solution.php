<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $batteries
     * @return Integer
     */
    function maxRunTime($n, $batteries) {
        $total = array_sum($batteries);
        $low = 0;
        $high = intdiv($total, $n);

        while ($low < $high) {
            $mid = intdiv($low + $high + 1, 2);
            $required = $n * $mid;
            $sum = 0;
            foreach ($batteries as $b) {
                $sum += min($b, $mid);
                if ($sum >= $required) {
                    break;
                }
            }
            if ($sum >= $required) {
                $low = $mid;
            } else {
                $high = $mid - 1;
            }
        }

        return $low;
    }
}