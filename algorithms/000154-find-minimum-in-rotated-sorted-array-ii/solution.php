<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin(array $nums): int
    {
        $low = 0;
        $high = count($nums) - 1;

        while ($low < $high) {
            $mid = intdiv($low + $high, 2);

            if ($nums[$mid] > $nums[$high]) {
                // Minimum is in the right half
                $low = $mid + 1;
            } elseif ($nums[$mid] < $nums[$high]) {
                // Minimum is in the left half (or at mid)
                $high = $mid;
            } else {
                // Duplicate case: can't determine, move high down by 1
                $high--;
            }
        }

        return $nums[$low];
    }
}