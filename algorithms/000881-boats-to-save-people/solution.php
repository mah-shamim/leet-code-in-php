<?php

class Solution {

    /**
     * @param Integer[] $people
     * @param Integer $limit
     * @return Integer
     */
    function numRescueBoats(array $people, int $limit): int
    {
        $ans = 0;
        $i = 0;
        $j = count($people) - 1;

        sort($people);

        while ($i <= $j) {
            $remain = $limit - $people[$j];
            $j -= 1;
            if ($people[$i] <= $remain) {
                $i += 1;
            }
            $ans += 1;
        }

        return $ans;
    }
}