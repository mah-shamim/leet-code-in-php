<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses(string $s): int
    {
        $stack = [-1];
        $maxLen = 0;
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] === '(') {
                $stack[] = $i;
            } else {
                array_pop($stack);

                if (empty($stack)) {
                    // No matching '(' for this ')', so use current index as new base.
                    $stack[] = $i;
                } else {
                    // Length of current valid substring.
                    $maxLen = max($maxLen, $i - $stack[count($stack) - 1]);
                }
            }
        }

        return $maxLen;
    }
}