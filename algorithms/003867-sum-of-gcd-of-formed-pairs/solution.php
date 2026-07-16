<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function gcdSum(array $nums): int
    {
        $n = count($nums);
        $prefixGcd = [];
        $mx = 0;

        // Step 1: Compute prefixGcd
        for ($i = 0; $i < $n; $i++) {
            $mx = max($mx, $nums[$i]);
            $prefixGcd[] = $this->gcd($nums[$i], $mx);
        }

        // Step 2: Sort prefixGcd in non-decreasing order
        sort($prefixGcd);

        // Step 3: Pair smallest with largest and compute GCD sum
        $left = 0;
        $right = $n - 1;
        $sum = 0;

        while ($left < $right) {
            $sum += $this->gcd($prefixGcd[$left], $prefixGcd[$right]);
            $left++;
            $right--;
        }

        return $sum;
    }

    /**
     * Helper GCD function
     *
     * @param $a
     * @param $b
     * @return int|mixed
     */
    function gcd($a, $b): mixed
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }
}