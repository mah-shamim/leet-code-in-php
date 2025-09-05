<?php

class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function makeTheIntegerZero($num1, $num2) {
        for ($k = 1; $k <= 60; $k++) {
            $S = $num1 - $k * $num2;
            if ($S < $k) {
                continue;
            }
            $count = 0;
            $n = $S;
            while ($n) {
                $count += $n & 1;
                $n >>= 1;
            }
            if ($count <= $k) {
                return $k;
            }
        }
        return -1;
    }
}