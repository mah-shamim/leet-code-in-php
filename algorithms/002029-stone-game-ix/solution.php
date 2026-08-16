<?php

class Solution {

    /**
     * @param Integer[] $stones
     * @return Boolean
     */
    function stoneGameIX(array $stones): bool
    {
        $count = [0, 0, 0];

        foreach ($stones as $stone) {
            $count[$stone % 3]++;
        }

        if ($count[0] % 2 == 0) {
            return min($count[1], $count[2]) > 0;
        }

        return abs($count[1] - $count[2]) > 2;
    }
}