<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @param Integer $maxCost
     * @return Integer
     */
    function equalSubstring($s, $t, $maxCost) {
        $j = 0;
        for ($i = 0; $i < strlen($s); ++$i) {
            $maxCost -= abs(ord($s[$i]) - ord($t[$i]));
            if ($maxCost < 0)
                $maxCost += abs(ord($s[$j]) - ord($t[$j++]));
        }

        return strlen($s) - $j;
    }
}
