<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function mirrorDistance(int $n): int
    {
        $original = $n;
        $reversed = 0;

        while ($n > 0) {
            $reversed = $reversed * 10 + ($n % 10);
            $n = (int)($n / 10);
        }

        return abs($original - $reversed);
    }
}