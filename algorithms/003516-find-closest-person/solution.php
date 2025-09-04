<?php

class Solution {

    /**
     * @param Integer $x
     * @param Integer $y
     * @param Integer $z
     * @return Integer
     */
    function findClosest($x, $y, $z) {
        $dist1 = abs($x - $z);
        $dist2 = abs($y - $z);
        if ($dist1 < $dist2) {
            return 1;
        } elseif ($dist2 < $dist1) {
            return 2;
        } else {
            return 0;
        }
    }
}