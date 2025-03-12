<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumCount($nums) {
        $n = count($nums);
        $first_non_negative = $this->findFirstNonNegative($nums);
        $first_positive = $this->findFirstPositive($nums);
        $neg = $first_non_negative;
        $pos = $n - $first_positive;
        return max($neg, $pos);
    }

    /**
     * @param $nums
     * @return int
     */
    private function findFirstNonNegative($nums) {
        $low = 0;
        $high = count($nums) - 1;
        $result = count($nums);
        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            if ($nums[$mid] >= 0) {
                $result = $mid;
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        return $result;
    }

    /**
     * @param $nums
     * @return int
     */
    private function findFirstPositive($nums) {
        $low = 0;
        $high = count($nums) - 1;
        $result = count($nums);
        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            if ($nums[$mid] > 0) {
                $result = $mid;
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        return $result;
    }
}