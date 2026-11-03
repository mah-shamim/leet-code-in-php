<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves(array $nums): int
    {
        $max = max($nums);
        $moves = 0;

        foreach ($nums as $num) {
            $moves += $max - $num;
        }

        return $moves;
    }
}



/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMoves(array $nums): int
{
    $max = max($nums);
    $moves = 0;

    foreach ($nums as $num) {
        $moves += $max - $num;
    }

    return $moves;
}