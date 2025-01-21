<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function strangePrinter($s) {
        $n = strlen($s);
        $dp = array_fill(0, $n, array_fill(0, $n, 0));

        for ($i = $n - 1; $i >= 0; $i--) {
            $dp[$i][$i] = 1; // Single character needs only one turn
            for ($j = $i + 1; $j < $n; $j++) {
                $dp[$i][$j] = $dp[$i][$j - 1] + 1;
                for ($k = $i; $k < $j; $k++) {
                    if ($s[$k] == $s[$j]) {
                        $dp[$i][$j] = min($dp[$i][$j], $dp[$i][$k] + ($k + 1 <= $j - 1 ? $dp[$k + 1][$j - 1] : 0));
                    }
                }
            }
        }

        return $dp[0][$n - 1];

    }
}