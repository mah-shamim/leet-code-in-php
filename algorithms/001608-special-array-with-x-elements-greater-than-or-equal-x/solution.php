<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function specialArray($nums) {
        sort($nums);

        if ($nums[0] >= count($nums))
            return count($nums);

        for ($i = 1; $i < count($nums); ++$i) {
            $count = count($nums) - $i;
            if ($nums[$i - 1] < $count && $nums[$i] >= $count)
                return $count;
        }

        return -1;
    }
}