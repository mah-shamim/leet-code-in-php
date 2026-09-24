<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function smallestIndex(array $nums): int
    {
        foreach ($nums as $i => $num) {
            $sum = 0;
            $x = $num;

            while ($x > 0) {
                $sum += $x % 10;
                $x = intdiv($x, 10);
            }

            if ($sum === $i) {
                return $i;
            }
        }

        return -1;
    }
}