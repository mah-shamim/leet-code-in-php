<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findScore($nums) {
        $n = count($nums);
        $score = 0;
        $marked = array_fill(0, $n, false);
        $heap = [];

        // Build a min-heap with values and their indices
        for ($i = 0; $i < $n; $i++) {
            $heap[] = [$nums[$i], $i];
        }

        // Sort the heap based on values, and on index if values are tied
        usort($heap, function($a, $b) {
            if ($a[0] === $b[0]) {
                return $a[1] - $b[1];
            }
            return $a[0] - $b[0];
        });

        // Process the heap
        foreach ($heap as $entry) {
            list($value, $index) = $entry;

            // Skip if already marked
            if ($marked[$index]) {
                continue;
            }

            // Add the value to the score
            $score += $value;

            // Mark the current and adjacent elements
            $marked[$index] = true;
            if ($index > 0) {
                $marked[$index - 1] = true;
            }
            if ($index < $n - 1) {
                $marked[$index + 1] = true;
            }
        }

        return $score;
    }
}