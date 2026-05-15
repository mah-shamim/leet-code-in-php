<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin(array $nums): int
    {
        $left = 0;
        $right = count($nums) - 1;

        while ($left < $right) {
            $mid = intdiv($left + $right, 2);

            if ($nums[$mid] > $nums[$right]) {
                // Minimum is in the right half
                $left = $mid + 1;
            } else {
                // Minimum is in the left half (including mid)
                $right = $mid;
            }
        }

        return $nums[$left];
    }
}