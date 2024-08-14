<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function smallestDistancePair($nums, $k) {
        sort($nums);
        $low = 0;
        $high = $nums[count($nums) - 1] - $nums[0];

        while ($low < $high) {
            $mid = intval(($low + $high) / 2);

            if ($this->countPairsWithDistanceLessThanOrEqualTo($nums, $mid) < $k) {
                $low = $mid + 1;
            } else {
                $high = $mid;
            }
        }

        return $low;

    }

    /**
     * @param $nums
     * @param $mid
     * @return int
     */
    function countPairsWithDistanceLessThanOrEqualTo($nums, $mid) {
        $count = 0;
        $left = 0;

        for ($right = 1; $right < count($nums); $right++) {
            while ($nums[$right] - $nums[$left] > $mid) {
                $left++;
            }
            $count += $right - $left;
        }

        return $count;
    }

}