<?php

class Solution {

    /**
     * @param Integer[][] $questions
     * @return Integer
     */
    function mostPoints($questions) {
        $n = count($questions);
        $dp = array_fill(0, $n + 1, 0);

        for ($i = $n - 1; $i >= 0; $i--) {
            $points = $questions[$i][0];
            $bp = $questions[$i][1];
            $next = $i + $bp + 1;
            $solve = $points + ($next <= $n ? $dp[$next] : 0);
            $skip = $dp[$i + 1];
            $dp[$i] = max($solve, $skip);
        }

        return $dp[0];
    }
}