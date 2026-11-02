<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves2(array $nums): int
    {
        sort($nums);
        $n = count($nums);
        $median = $nums[intdiv($n, 2)]; // works for odd and even n
        $moves = 0;
        foreach ($nums as $num) {
            $moves += abs($num - $median);
        }
        return $moves;
    }
}