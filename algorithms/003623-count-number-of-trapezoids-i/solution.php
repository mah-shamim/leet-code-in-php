<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function countTrapezoids($points) {
        $MOD = 1000000007;

        // Group points by their y-coordinate
        $yGroups = [];
        foreach ($points as $point) {
            $y = $point[1];
            if (!isset($yGroups[$y])) {
                $yGroups[$y] = 0;
            }
            $yGroups[$y]++;
        }

        // Count trapezoids using combinatorial approach
        $result = 0;

        // Convert group counts to array for processing
        $counts = array_values($yGroups);
        $n = count($counts);

        // Method 1: Efficient O(n) approach using prefix sums
        // For each group, we need to know sum of C(count_j, 2) for all j > i
        // total = Σ_i Σ_j>i [C(count_i, 2) * C(count_j, 2)]

        // Precompute C(count, 2) for each group
        $combinations = [];
        $totalCombinations = 0;

        foreach ($counts as $count) {
            if ($count >= 2) {
                $c = (int)(($count * ($count - 1)) / 2);
                $c %= $MOD;
                $combinations[] = $c;
                $totalCombinations = ($totalCombinations + $c) % $MOD;
            } else {
                $combinations[] = 0;
            }
        }

        // Calculate result using efficient formula
        // For each group i: result += combinations[i] * (sum of combinations[j] for j > i)
        // We can compute this by maintaining a running sum from the end

        $suffixSum = 0;
        for ($i = $n - 1; $i >= 0; $i--) {
            if ($combinations[$i] > 0) {
                $result = ($result + ($combinations[$i] * $suffixSum) % $MOD) % $MOD;
                $suffixSum = ($suffixSum + $combinations[$i]) % $MOD;
            }
        }

        return $result % $MOD;
    }
}