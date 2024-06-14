<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minIncrementForUnique($nums) {
        $ans = 0;
        $minAvailable = 0;

        sort($nums);

        foreach ($nums as $num) {
            $ans += max($minAvailable - $num, 0);
            $minAvailable = max($minAvailable, $num) + 1;
        }

        return $ans;
    }
}