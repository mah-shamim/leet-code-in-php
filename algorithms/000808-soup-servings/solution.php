<?php

class Solution {

    /**
     * @param Integer $n
     * @return Float
     */
    function soupServings($n) {
        if ($n >= 4800) {
            return 1.0;
        }
        $k = ceil($n / 25);
        if ($k == 0) {
            return 0.5;
        }
        $dp = array_fill(0, $k + 1, array_fill(0, $k + 1, 0.0));
        for ($i = 0; $i <= $k; $i++) {
            for ($j = 0; $j <= $k; $j++) {
                if ($i == 0 && $j == 0) {
                    $dp[$i][$j] = 0.5;
                } else if ($i == 0) {
                    $dp[$i][$j] = 1.0;
                } else if ($j == 0) {
                    $dp[$i][$j] = 0.0;
                } else {
                    $a1 = max(0, $i - 4);
                    $b1 = $j;
                    $a2 = max(0, $i - 3);
                    $b2 = max(0, $j - 1);
                    $a3 = max(0, $i - 2);
                    $b3 = max(0, $j - 2);
                    $a4 = max(0, $i - 1);
                    $b4 = max(0, $j - 3);
                    $dp[$i][$j] = 0.25 * ($dp[$a1][$b1] + $dp[$a2][$b2] + $dp[$a3][$b3] + $dp[$a4][$b4]);
                }
            }
        }
        return $dp[$k][$k];
    }
}