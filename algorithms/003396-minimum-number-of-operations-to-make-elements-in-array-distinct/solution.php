<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumOperations($nums) {
        $n = count($nums);
        for ($k = 0; ; $k++) {
            $start = 3 * $k;
            if ($start >= $n) {
                return $k;
            }
            $subarray = array_slice($nums, $start);
            $seen = array();
            $valid = true;
            foreach ($subarray as $num) {
                if (isset($seen[$num])) {
                    $valid = false;
                    break;
                }
                $seen[$num] = true;
            }
            if ($valid) {
                return $k;
            }
        }
    }
}