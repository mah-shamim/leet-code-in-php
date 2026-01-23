<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumPairRemoval(array $nums): int
    {
        $n = count($nums);
        if ($n <= 1) return 0;

        // Store current values at each index
        $values = $nums;
        // Store next and previous active indices
        $next = array_fill(0, $n, -1);
        $prev = array_fill(0, $n, -1);

        // Initialize linked list structure
        for ($i = 0; $i < $n; $i++) {
            $next[$i] = $i + 1 < $n ? $i + 1 : -1;
            $prev[$i] = $i - 1 >= 0 ? $i - 1 : -1;
        }

        // Min-heap to store (sum, left_index) pairs
        $heap = new SplMinHeap();

        // Initialize heap with all adjacent pairs
        for ($i = 0; $i < $n - 1; $i++) {
            $heap->insert([$values[$i] + $values[$i + 1], $i]);
        }

        // Count decreasing pairs (nums[i] > nums[i+1])
        $decreasingPairs = 0;
        for ($i = 0; $i < $n - 1; $i++) {
            if ($values[$i] > $values[$i + 1]) {
                $decreasingPairs++;
            }
        }

        // Track removed indices
        $removed = array_fill(0, $n, false);
        $operations = 0;

        // Continue while there are decreasing pairs
        while ($decreasingPairs > 0) {
            // Get the pair with minimum sum (leftmost if tie)
            do {
                list($sum, $left) = $heap->extract();
            } while (
                $removed[$left] ||
                $next[$left] == -1 ||
                $removed[$next[$left]] ||
                $sum != $values[$left] + $values[$next[$left]]
            );

            $right = $next[$left];

            // Update decreasing pairs count for broken pairs
            if ($prev[$left] != -1 && $values[$prev[$left]] > $values[$left]) {
                $decreasingPairs--;
            }
            if ($values[$left] > $values[$right]) {
                $decreasingPairs--;
            }
            if ($next[$right] != -1 && $values[$right] > $values[$next[$right]]) {
                $decreasingPairs--;
            }

            // Merge the pair
            $newValue = $values[$left] + $values[$right];
            $values[$left] = $newValue;

            // Remove the right element from the list
            $nextRight = $next[$right];
            $next[$left] = $nextRight;
            if ($nextRight != -1) {
                $prev[$nextRight] = $left;
            }
            $removed[$right] = true;

            // Update decreasing pairs count for new pairs
            if ($prev[$left] != -1 && $values[$prev[$left]] > $values[$left]) {
                $decreasingPairs++;
            }
            if ($next[$left] != -1 && $values[$left] > $values[$next[$left]]) {
                $decreasingPairs++;
            }

            // Add new pairs to heap
            if ($prev[$left] != -1) {
                $heap->insert([$values[$prev[$left]] + $values[$left], $prev[$left]]);
            }
            if ($next[$left] != -1) {
                $heap->insert([$values[$left] + $values[$next[$left]], $left]);
            }

            $operations++;
        }

        return $operations;
    }
}