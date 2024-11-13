<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $lower
     * @param Integer $upper
     * @return Integer
     */
    function countFairPairs($nums, $lower, $upper) {
        sort($nums);
        $n = count($nums);
        $count = 0;

        for ($i = 0; $i < $n - 1; $i++) {
            $low = $lower - $nums[$i];
            $high = $upper - $nums[$i];

            $left = $this->lowerBound($nums, $low, $i + 1);
            $right = $this->upperBound($nums, $high, $i + 1);

            $count += $right - $left;
        }

        return $count;
    }

    /**
     * Helper function for binary search to find left boundary
     *
     * @param $arr
     * @param $target
     * @param $start
     * @return int|mixed
     */
    function lowerBound($arr, $target, $start) {
        $left = $start;
        $right = count($arr);
        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        return $left;
    }

    /**
     * Helper function for binary search to find right boundary
     *
     * @param $arr
     * @param $target
     * @param $start
     * @return int|mixed
     */
    function upperBound($arr, $target, $start) {
        $left = $start;
        $right = count($arr);
        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($arr[$mid] <= $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        return $left;
    }
}