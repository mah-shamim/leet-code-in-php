<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves(array $nums): int
    {
        $min = min($nums);
        $moves = 0;

        foreach ($nums as $num) {
            $moves += $num - $min;
        }

        return $moves;
    }
}