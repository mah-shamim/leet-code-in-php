<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @param Integer $start
     * @return Integer
     */
    function getMinDistance(array $nums, int $target, int $start): int
    {
        $minDistance = PHP_INT_MAX;

        foreach ($nums as $i => $num) {
            if ($num == $target) {
                $distance = abs($i - $start);
                if ($distance < $minDistance) {
                    $minDistance = $distance;
                }
            }
        }

        return $minDistance;
    }
}