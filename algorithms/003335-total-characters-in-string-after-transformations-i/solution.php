<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $t
     * @return Integer
     */
    function lengthAfterTransformations($s, $t) {
        $mod = 1000000007;
        $prev = array_fill(0, 26, 1); // Represents dp[0] (t=0)

        for ($step = 1; $step <= $t; $step++) {
            $curr = array();
            for ($c = 0; $c < 26; $c++) {
                if ($c < 25) {
                    $curr[$c] = $prev[$c + 1] % $mod;
                } else {
                    $curr[$c] = ($prev[0] + $prev[1]) % $mod;
                }
            }
            $prev = $curr;
        }

        $sum = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $code = ord($s[$i]) - ord('a');
            $sum = ($sum + $prev[$code]) % $mod;
        }
        return $sum;
    }
}