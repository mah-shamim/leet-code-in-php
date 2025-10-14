<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function hasIncreasingSubarrays($nums, $k) {
        $n = count($nums);
        for ($i = 0; $i <= $n - 2 * $k; $i++) {
            $firstValid = true;
            for ($j = $i; $j < $i + $k - 1; $j++) {
                if ($nums[$j] >= $nums[$j + 1]) {
                    $firstValid = false;
                    break;
                }
            }
            if (!$firstValid) {
                continue;
            }

            $secondValid = true;
            for ($j = $i + $k; $j < $i + 2 * $k - 1; $j++) {
                if ($nums[$j] >= $nums[$j + 1]) {
                    $secondValid = false;
                    break;
                }
            }
            if ($secondValid) {
                return true;
            }
        }
        return false;
    }
}