<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $l
     * @param Integer $r
     * @return Integer
     */
    function minimumSumSubarray(array $nums, int $l, int $r): int
    {
        $n = count($nums);

        // Prefix sums: prefix[i] = sum of nums[0 ... i-1]
        $prefix = array_fill(0, $n + 1, 0);
        for ($i = 0; $i < $n; $i++) {
            $prefix[$i + 1] = $prefix[$i] + $nums[$i];
        }

        $minSum = PHP_INT_MAX;

        for ($start = 0; $start < $n; $start++) {
            for ($end = $start + $l - 1; $end < $n && $end - $start + 1 <= $r; $end++) {
                $sum = $prefix[$end + 1] - $prefix[$start];

                if ($sum > 0 && $sum < $minSum) {
                    $minSum = $sum;
                }
            }
        }

        return $minSum === PHP_INT_MAX ? -1 : $minSum;
    }
}