<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumDeletions(array $nums): int
    {
        $n = count($nums);

        // If only one element, remove it
        if ($n == 1) {
            return 1;
        }

        // Find indices of minimum and maximum
        $minIdx = 0;
        $maxIdx = 0;

        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] < $nums[$minIdx]) {
                $minIdx = $i;
            }
            if ($nums[$i] > $nums[$maxIdx]) {
                $maxIdx = $i;
            }
        }

        // Make sure minIdx <= maxIdx for easier calculation
        $left = min($minIdx, $maxIdx);
        $right = max($minIdx, $maxIdx);

        // Scenario 1: Remove both from front
        $fromFront = max($left, $right) + 1; // Remove up to the farther element

        // Scenario 2: Remove both from back
        $fromBack = $n - min($left, $right); // Remove from the farther element from back

        // Scenario 3: Remove one from front, one from back
        $fromBoth = ($left + 1) + ($n - $right);

        // Return the minimum of all scenarios
        return min($fromFront, $fromBack, $fromBoth);
    }
}