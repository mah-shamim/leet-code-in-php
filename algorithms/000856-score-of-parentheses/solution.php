<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function scoreOfParentheses(string $s): int
    {
        // Stack starts with the total score for the current level.
        $stack = [0];
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] === '(') {
                // Start a new nested level.
                $stack[] = 0;
            } else {
                // Close the current level.
                $top = array_pop($stack);

                // "()" has score 1, otherwise "(A)" has score 2 * A.
                $score = ($top === 0) ? 1 : 2 * $top;

                // Add this score to the parent level.
                $stack[count($stack) - 1] += $score;
            }
        }

        return $stack[0];
    }
}