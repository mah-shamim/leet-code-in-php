<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $ans = 0;
        $count = array_fill(0, 128, 0);

        foreach(str_split($s) as $c) {
            $count[ord($c)]++;
        }

        foreach($count as $freq) {
            $ans += $freq % 2 == 0 ? $freq : $freq - 1;
        }

        $hasOddCount = false;
        foreach($count as $c) {
            if($c % 2 != 0) {
                $hasOddCount = true;
                break;
            }
        }

        return $ans + ($hasOddCount ? 1 : 0);
    }
}