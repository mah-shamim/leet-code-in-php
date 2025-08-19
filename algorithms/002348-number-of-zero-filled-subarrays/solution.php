<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function zeroFilledSubarray($nums) {
        $total = 0;
        $currentCount = 0;

        foreach ($nums as $num) {
            if ($num == 0) {
                $currentCount++;
            } else {
                $total += (int)($currentCount * ($currentCount + 1) / 2);
                $currentCount = 0;
            }
        }
        $total += (int)($currentCount * ($currentCount + 1) / 2);

        return $total;
    }
}