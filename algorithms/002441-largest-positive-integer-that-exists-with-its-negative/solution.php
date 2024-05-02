<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxK(array $nums): int
    {
        $ans = -1;
        $seen = [];

        foreach ($nums as $num) {
            if (in_array(-$num, $seen)) {
                $ans = max($ans, abs($num));
            } else {
                array_push($seen, $num);
            }
        }

        return $ans;
    }
}