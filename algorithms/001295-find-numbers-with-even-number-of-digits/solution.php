<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumbers($nums) {
        $count = 0;
        foreach ($nums as $num) {
            $numStr = (string)$num;
            if (strlen($numStr) % 2 == 0) {
                $count++;
            }
        }
        return $count;
    }
}