<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    function differenceOfSums($n, $m) {
        $total = $n * ($n + 1) / 2;
        $k = (int)($n / $m);
        $sum2 = $m * $k * ($k + 1) / 2;
        return $total - 2 * $sum2;
    }
}