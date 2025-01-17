<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n) {
        $uglyNumbers = array_fill(0, $n, 0);
        $uglyNumbers[0] = 1;

        $i2 = $i3 = $i5 = 0;
        $next2 = 2;
        $next3 = 3;
        $next5 = 5;

        for ($i = 1; $i < $n; $i++) {
            $nextUgly = min($next2, $next3, $next5);
            $uglyNumbers[$i] = $nextUgly;

            if ($nextUgly == $next2) {
                $i2++;
                $next2 = $uglyNumbers[$i2] * 2;
            }
            if ($nextUgly == $next3) {
                $i3++;
                $next3 = $uglyNumbers[$i3] * 3;
            }
            if ($nextUgly == $next5) {
                $i5++;
                $next5 = $uglyNumbers[$i5] * 5;
            }
        }

        return $uglyNumbers[$n - 1];

    }
}