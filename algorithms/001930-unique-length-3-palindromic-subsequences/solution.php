<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countPalindromicSubsequence($s) {
        $n = strlen($s);
        $prefix = array_fill(0, $n, []);
        $suffix = array_fill(0, $n, []);

        // Track prefix characters
        $seen = [];
        for ($i = 0; $i < $n; $i++) {
            $prefix[$i] = $seen;
            $seen[$s[$i]] = true;
        }

        // Track suffix characters
        $seen = [];
        for ($i = $n - 1; $i >= 0; $i--) {
            $suffix[$i] = $seen;
            $seen[$s[$i]] = true;
        }

        // Track unique palindromic subsequences
        $uniquePalindromes = [];

        // Check for each character as the middle character
        for ($i = 1; $i < $n - 1; $i++) {
            foreach ($prefix[$i] as $char1 => $true) {
                if (isset($suffix[$i][$char1])) {
                    $palindrome = $char1 . $s[$i] . $char1;
                    $uniquePalindromes[$palindrome] = true;
                }
            }
        }

        // Return the count of unique palindromic subsequences
        return count($uniquePalindromes);
    }
}