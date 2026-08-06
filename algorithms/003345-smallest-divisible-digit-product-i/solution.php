<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $t
     * @return Integer
     */
    function smallestNumber(int $n, int $t): int
    {
        $num = $n;
        while (true) {
            $product = 1;
            $temp = $num;
            while ($temp > 0) {
                $product *= $temp % 10;
                $temp = intdiv($temp, 10);
                // If product becomes 0, we can break early
                if ($product == 0) break;
            }
            if ($product % $t == 0) {
                return $num;
            }
            $num++;
        }
    }
}