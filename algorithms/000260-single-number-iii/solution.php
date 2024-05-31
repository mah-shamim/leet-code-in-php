<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function singleNumber($nums) {
        $xors = array_reduce($nums, function($carry, $item) { return $carry ^ $item; }, 0);
        $lowbit = $xors & -$xors;
        $ans = array_fill(0, 2, 0);

        // Seperate `nums` into two groups by `lowbit`.
        foreach ($nums as $num) {
            if ($num & $lowbit) {
                $ans[0] ^= $num;
            } else {
                $ans[1] ^= $num;
            }
        }

        return $ans;

    }
}
