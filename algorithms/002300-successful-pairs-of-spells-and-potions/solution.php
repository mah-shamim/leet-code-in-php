<?php

class Solution {

    /**
     * @param Integer[] $spells
     * @param Integer[] $potions
     * @param Integer $success
     * @return Integer[]
     */
    function successfulPairs($spells, $potions, $success) {
        sort($potions);
        $n = count($spells);
        $m = count($potions);
        $result = [];

        foreach ($spells as $spell) {
            $required = (int) ceil($success / $spell);
            $left = 0;
            $right = $m - 1;
            $index = $m;

            while ($left <= $right) {
                $mid = (int) (($left + $right) / 2);
                if ($potions[$mid] >= $required) {
                    $index = $mid;
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            $result[] = $m - $index;
        }

        return $result;
    }
}