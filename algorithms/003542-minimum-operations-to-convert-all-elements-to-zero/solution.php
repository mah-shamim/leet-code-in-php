<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        $ans = 0;
        $stack = [];
        array_push($stack, 0);

        foreach ($nums as $num) {
            while (!empty($stack) && end($stack) > $num) {
                array_pop($stack);
            }
            if (empty($stack) || end($stack) < $num) {
                $ans++;
                array_push($stack, $num);
            }
        }

        return $ans;
    }
}