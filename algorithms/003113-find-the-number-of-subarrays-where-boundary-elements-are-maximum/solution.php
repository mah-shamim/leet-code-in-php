<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numberOfSubarrays(array $nums): int
    {
        $stack = [];
        $res = 0;

        for ($r = 0; $r < count($nums); $r++) {
            while ($stack && $stack[count($stack) - 1][0] < $nums[$r]) {
                array_pop($stack);
            }

            if ($stack && $stack[count($stack) - 1][0] == $nums[$r]) {
                $stack[count($stack) - 1][1]++;
            } else {
                array_push($stack, [$nums[$r], 1]);
            }

            $res += $stack[count($stack) - 1][1];
        }

        return $res;
    }
}