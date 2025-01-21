<?php

class Solution {

    /**
     * @param String $s
     * @param String $locked
     * @return Boolean
     */
    function canBeValid($s, $locked) {
        $n = strlen($s);

        // A valid parentheses string must have an even length
        if ($n % 2 !== 0) {
            return false;
        }

        // Step 1: Check from left to right
        $open = 0; // Tracks possible '(' count
        for ($i = 0; $i < $n; $i++) {
            // If `locked` is 0, we can treat it as either '(' or ')'
            if ($locked[$i] === '0' || $s[$i] === '(') {
                $open++;
            } else {
                // If locked[i] is '1' and s[i] is ')', it reduces the balance
                $open--;
            }

            // At any point, if openBalance is negative, it's invalid
            if ($open < 0) {
                return false;
            }
        }

        // Step 2: Check from right to left
        $close = 0; // Tracks possible ')' count
        for ($i = $n - 1; $i >= 0; $i--) {
            // If `locked` is 0, we can treat it as either '(' or ')'
            if ($locked[$i] === '0' || $s[$i] === ')') {
                $close++;
            } else {
                // If locked[i] is '1' and s[i] is '(', it reduces the balance
                $close--;
            }

            // At any point, if closeBalance is negative, it's invalid
            if ($close < 0) {
                return false;
            }
        }

        // If both checks pass, the string can be valid
        return true;
    }
}