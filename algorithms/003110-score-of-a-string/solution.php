<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function scoreOfString($s) {
        $ans = 0;

        for ($i = 1; $i < strlen($s); ++$i) {
            $ans += abs(ord($s[$i]) - ord($s[$i - 1]));
        }

        return $ans;
    }
}