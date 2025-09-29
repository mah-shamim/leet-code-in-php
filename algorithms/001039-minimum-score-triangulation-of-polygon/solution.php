<?php

class Solution {

    /**
     * @param Integer[] $values
     * @return Integer
     */
    function minScoreTriangulation($values) {
        $n = count($values);
        $dp = array_fill(0, $n, array_fill(0, $n, 0));

        for ($length = 3; $length <= $n; $length++) {
            for ($i = 0; $i <= $n - $length; $i++) {
                $j = $i + $length - 1;
                $dp[$i][$j] = PHP_INT_MAX;
                for ($k = $i + 1; $k < $j; $k++) {
                    $score = $dp[$i][$k] + $dp[$k][$j] + $values[$i] * $values[$k] * $values[$j];
                    if ($score < $dp[$i][$j]) {
                        $dp[$i][$j] = $score;
                    }
                }
            }
        }

        return $dp[0][$n - 1];
    }
}