<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minSwaps(array $nums): int
    {
        $n = count($nums);
        if ($n <= 1) {
            return 0;
        }

        // Create pairs of [digit_sum, value] for sorting
        $pairs = [];
        for ($i = 0; $i < $n; $i++) {
            $pairs[] = [$this->digitSum($nums[$i]), $nums[$i]];
        }

        // Sort by digit sum, then by value as tiebreaker
        usort($pairs, function ($a, $b) {
            if ($a[0] !== $b[0]) {
                return $a[0] - $b[0];
            }
            return $a[1] - $b[1];
        });

        // Map each original value to its target index in the sorted array
        // Since values are distinct, we can use value -> target_index mapping
        $valueToTargetIndex = [];
        for ($i = 0; $i < $n; $i++) {
            $valueToTargetIndex[$pairs[$i][1]] = $i;
        }

        // Build the permutation: perm[i] = target index of the element currently at position i
        $perm = [];
        for ($i = 0; $i < $n; $i++) {
            $perm[$i] = $valueToTargetIndex[$nums[$i]];
        }

        // Count cycles in the permutation
        $visited = array_fill(0, $n, false);
        $cycles = 0;

        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $cycles++;
                $j = $i;
                while (!$visited[$j]) {
                    $visited[$j] = true;
                    $j = $perm[$j];
                }
            }
        }

        // Minimum swaps = n - number of cycles
        return $n - $cycles;
    }

    /**
     * Compute the sum of digits of a positive integer
     *
     * @param Integer $num
     * @return Integer
     */
    private function digitSum(int $num): int
    {
        $sum = 0;
        while ($num > 0) {
            $sum += $num % 10;
            $num = intdiv($num, 10);
        }
        return $sum;
    }
}