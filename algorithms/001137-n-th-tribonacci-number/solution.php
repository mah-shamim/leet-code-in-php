<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci(int $n): int
    {
        $dp = [0, 1, 1];

        for ($i = 3; $i < $n + 1; $i++) {
            $dp[$i % 3] = array_sum($dp);
        }

        return $dp[$n % 3];
    }
}