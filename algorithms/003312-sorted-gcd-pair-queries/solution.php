<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $queries
     * @return Integer[]
     */
    function gcdValues(array $nums, array $queries): array
    {
        $mx = max($nums);
        $freq = array_fill(0, $mx + 1, 0);
        foreach ($nums as $num) {
            $freq[$num]++;
        }

        // count multiples for each d
        $multiplesCount = array_fill(0, $mx + 1, 0);
        for ($d = 1; $d <= $mx; $d++) {
            $sum = 0;
            for ($multiple = $d; $multiple <= $mx; $multiple += $d) {
                $sum += $freq[$multiple];
            }
            $multiplesCount[$d] = $sum;
        }

        // total pairs with both numbers divisible by d
        $totalPairsMultiple = array_fill(0, $mx + 1, 0);
        for ($d = 1; $d <= $mx; $d++) {
            $cnt = $multiplesCount[$d];
            $totalPairsMultiple[$d] = $cnt * ($cnt - 1) / 2;
        }

        // exact gcd count via inclusion-exclusion
        $exactGCD = array_fill(0, $mx + 1, 0);
        for ($d = $mx; $d >= 1; $d--) {
            $exactGCD[$d] = $totalPairsMultiple[$d];
            for ($multiple = 2 * $d; $multiple <= $mx; $multiple += $d) {
                $exactGCD[$d] -= $exactGCD[$multiple];
            }
        }

        // Build prefix sum over gcd values
        $prefix = array_fill(0, $mx + 1, 0);
        for ($d = 1; $d <= $mx; $d++) {
            $prefix[$d] = $prefix[$d - 1] + $exactGCD[$d];
        }

        // Answer queries
        $ans = [];
        $totalPairs = count($nums) * (count($nums) - 1) / 2;
        foreach ($queries as $q) {
            // binary search smallest d with prefix[d] > q
            $low = 1;
            $high = $mx;
            while ($low < $high) {
                $mid = intdiv($low + $high, 2);
                if ($prefix[$mid] > $q) {
                    $high = $mid;
                } else {
                    $low = $mid + 1;
                }
            }
            $ans[] = $low;
        }

        return $ans;
    }
}