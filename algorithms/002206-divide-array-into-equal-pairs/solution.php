<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function divideArray($nums) {
        $counts = array_count_values($nums);
        foreach ($counts as $cnt) {
            if ($cnt % 2 != 0) {
                return false;
            }
        }
        return true;
    }
}