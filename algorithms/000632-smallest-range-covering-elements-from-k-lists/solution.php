<?php

class Solution {

    /**
     * @param Integer[][] $nums
     * @return Integer[]
     */
    function smallestRange($nums) {
        // Initialize a min-heap to store (value, row_index, col_index)
        $minHeap = new SplMinHeap();
        $maxValue = PHP_INT_MIN; // Keep track of the maximum value in the current window

        // Initialize the heap with the first element of each list
        foreach ($nums as $rowIndex => $list) {
            $minHeap->insert([$list[0], $rowIndex, 0]);
            $maxValue = max($maxValue, $list[0]);
        }

        // Initialize the range with the max possible values
        $rangeStart = PHP_INT_MIN;
        $rangeEnd = PHP_INT_MAX;

        // Process the heap until we can no longer include all lists in the window
        while (!$minHeap->isEmpty()) {
            list($minValue, $rowIndex, $colIndex) = $minHeap->extract();

            // Update the smallest range
            if ($maxValue - $minValue < $rangeEnd - $rangeStart) {
                $rangeStart = $minValue;
                $rangeEnd = $maxValue;
            }

            // Move to the next element in the same list (if it exists)
            if ($colIndex + 1 < count($nums[$rowIndex])) {
                $nextValue = $nums[$rowIndex][$colIndex + 1];
                $minHeap->insert([$nextValue, $rowIndex, $colIndex + 1]);
                $maxValue = max($maxValue, $nextValue);
            } else {
                // If any list is exhausted, break the loop
                break;
            }
        }

        return [$rangeStart, $rangeEnd];
    }
}