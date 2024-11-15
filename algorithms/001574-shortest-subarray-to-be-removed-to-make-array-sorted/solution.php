<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function findLengthOfShortestSubarray($arr) {
        $n = count($arr);

        // Find the longest non-decreasing prefix
        $left = 0;
        while ($left < $n - 1 && $arr[$left] <= $arr[$left + 1]) {
            $left++;
        }

        // If the entire array is sorted
        if ($left == $n - 1) {
            return 0;
        }

        // Find the longest non-decreasing suffix
        $right = $n - 1;
        while ($right > 0 && $arr[$right - 1] <= $arr[$right]) {
            $right--;
        }

        // Minimum removal when keeping only the prefix or suffix
        $minRemove = min($n - $left - 1, $right);

        // Try to merge prefix and suffix
        $i = 0;
        $j = $right;
        while ($i <= $left && $j < $n) {
            if ($arr[$i] <= $arr[$j]) {
                $minRemove = min($minRemove, $j - $i - 1);
                $i++;
            } else {
                $j++;
            }
        }

        return $minRemove;
    }
}