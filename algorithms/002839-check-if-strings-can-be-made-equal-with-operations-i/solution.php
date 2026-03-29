<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function canBeEqual(string $s1, string $s2): bool
    {
        // check even indices (0,2)
        $even1 = [$s1[0], $s1[2]];
        $even2 = [$s2[0], $s2[2]];

        // check odd indices (1,3)
        $odd1 = [$s1[1], $s1[3]];
        $odd2 = [$s2[1], $s2[3]];

        sort($even1);
        sort($even2);
        sort($odd1);
        sort($odd2);

        return ($even1 === $even2) && ($odd1 === $odd2);
    }
}