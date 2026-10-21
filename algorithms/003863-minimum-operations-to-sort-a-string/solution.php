<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minOperations(string $s): int
    {
        $n = strlen($s);

        // Check if already sorted.
        $sorted = true;
        for ($i = 1; $i < $n; $i++) {
            if ($s[$i - 1] > $s[$i]) {
                $sorted = false;
                break;
            }
        }
        if ($sorted) {
            return 0;
        }

        // For length 2, the only proper substrings have length 1,
        // so an unsorted string cannot be changed.
        if ($n === 2) {
            return -1;
        }

        $mn = 'z';
        $mx = 'a';

        for ($i = 0; $i < $n; $i++) {
            $c = $s[$i];
            if ($c < $mn) $mn = $c;
            if ($c > $mx) $mx = $c;
        }

        // If the minimum is already first, sort the suffix.
        // If the maximum is already last, sort the prefix.
        if ($s[0] === $mn || $s[$n - 1] === $mx) {
            return 1;
        }

        // If minimum appears in a proper prefix, we can move it to front,
        // then sort the remaining suffix.
        for ($i = 0; $i < $n - 1; $i++) {
            if ($s[$i] === $mn) {
                return 2;
            }
        }

        // If maximum appears in a proper suffix, we can move it to end,
        // then sort the remaining prefix.
        for ($i = 1; $i < $n; $i++) {
            if ($s[$i] === $mx) {
                return 2;
            }
        }

        // Otherwise the string starts with maximum and ends with minimum,
        // which requires 3 operations for n >= 3.
        return 3;
    }
}