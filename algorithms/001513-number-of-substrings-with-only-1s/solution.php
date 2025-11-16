<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numSub($s) {
        $mod = 1000000007;
        $total = 0;
        $currentCount = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '1') {
                $currentCount++;
            } else {
                // Calculate substrings for the current group of 1s
                $total = ($total + (int)($currentCount * ($currentCount + 1) / 2)) % $mod;
                $currentCount = 0;
            }
        }

        // Don't forget the last group
        $total = ($total + (int)($currentCount * ($currentCount + 1) / 2)) % $mod;

        return $total;
    }
}