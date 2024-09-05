<?php

class Solution {

    /**
     * @param Integer[] $rolls
     * @param Integer $mean
     * @param Integer $n
     * @return Integer[]
     */
    function missingRolls($rolls, $mean, $n) {
        // Calculate the total sum needed for n + m rolls
        $m = count($rolls);
        $total_sum = ($n + $m) * $mean;

        // Calculate the sum of the given rolls
        $sum_rolls = array_sum($rolls);

        // Calculate the sum required for the missing rolls
        $missing_sum = $total_sum - $sum_rolls;

        // Check if the missing sum is within the valid range
        if ($missing_sum < $n || $missing_sum > 6 * $n) {
            return []; // Impossible to find valid missing rolls
        }

        // Initialize the result array with the minimum value 1
        $result = array_fill(0, $n, 1);
        $remaining_sum = $missing_sum - $n; // Already allocated n * 1 = n, so subtract this

        // Distribute the remaining sum to the rolls
        for ($i = 0; $i < $n && $remaining_sum > 0; $i++) {
            $add = min(5, $remaining_sum); // Add at most 5 to keep the value <= 6
            $result[$i] += $add;
            $remaining_sum -= $add;
        }

        return $result;

    }
}