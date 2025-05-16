<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums, $k) {
        foreach ($nums as $num) {
            if ($num < $k) {
                return -1;
            }
        }

        $unique_gt = array();
        foreach ($nums as $num) {
            if ($num > $k) {
                $unique_gt[$num] = true;
            }
        }

        return count($unique_gt);
    }
}