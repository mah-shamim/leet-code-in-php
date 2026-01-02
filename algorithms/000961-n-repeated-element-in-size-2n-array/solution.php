<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function repeatedNTimes($nums) {
        $map = [];
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                return $num;
            }
            $map[$num] = true;
        }
        // The problem guarantees a solution, so this line is technically unreachable
        return -1;
    }
}