<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $limit
     * @return Integer
     */
    function distributeCandies($n, $limit) {
        $f = function($x) {
            if ($x < 0) {
                return 0;
            }
            return ($x + 2) * ($x + 1) / 2;
        };

        $ans = $f($n)
            - 3 * $f($n - $limit - 1)
            + 3 * $f($n - 2 * $limit - 2)
            - $f($n - 3 * $limit - 3);

        return (int)$ans;
    }
}