<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function shortestPalindrome($s) {
        // If the string is empty, return an empty string
        if (empty($s)) {
            return $s;
        }

        // Reverse of the string
        $rev_s = strrev($s);

        // Form the new string as s + '#' + reverse(s)
        $combined = $s . '#' . $rev_s;

        // Compute the LPS array for this combined string
        $lps = $this->computeLPS($combined);

        // Length of the longest palindromic prefix in s
        $longest_palindromic_prefix_len = $lps[strlen($combined) - 1];

        // The characters that need to be added to the front are the remaining part of the string
        $remaining = substr($s, $longest_palindromic_prefix_len);

        // Add the reverse of the remaining part to the front of s
        return strrev($remaining) . $s;
    }

    /**
     * Helper function to compute the KMP (LPS array) for string matching
     *
     * @param $pattern
     * @return array
     */
    function computeLPS($pattern) {
        $n = strlen($pattern);
        $lps = array_fill(0, $n, 0);
        $len = 0;
        $i = 1;

        while ($i < $n) {
            if ($pattern[$i] == $pattern[$len]) {
                $len++;
                $lps[$i] = $len;
                $i++;
            } else {
                if ($len != 0) {
                    $len = $lps[$len - 1];
                } else {
                    $lps[$i] = 0;
                    $i++;
                }
            }
        }
        return $lps;
    }
}