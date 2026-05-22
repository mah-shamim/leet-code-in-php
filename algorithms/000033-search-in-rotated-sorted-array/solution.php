<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search(array $nums, int $target): int
    {
        $low = 0;
        $high = count($nums) - 1;

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);

            if ($nums[$mid] == $target) {
                return $mid;
            }

            // check if left part is sorted
            if ($nums[$low] <= $nums[$mid]) {
                if ($target >= $nums[$low] && $target < $nums[$mid]) {
                    $high = $mid - 1;
                } else {
                    $low = $mid + 1;
                }
            }
            // right part is sorted
            else {
                if ($target > $nums[$mid] && $target <= $nums[$high]) {
                    $low = $mid + 1;
                } else {
                    $high = $mid - 1;
                }
            }
        }

        return -1;
    }
}