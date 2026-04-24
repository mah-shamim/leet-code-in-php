<?php

class Solution {

    /**
     * @param String $moves
     * @return Integer
     */
    function furthestDistanceFromOrigin(string $moves): int
    {
        $r = substr_count($moves, 'R');
        $l = substr_count($moves, 'L');
        $underscore = substr_count($moves, '_');

        $maxPos = ($r - $l) + $underscore;
        $minPos = ($r - $l) - $underscore;

        return max(abs($maxPos), abs($minPos));
    }
}