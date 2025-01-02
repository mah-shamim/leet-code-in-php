<?php

class Solution {

    /**
     * @param String $s
     * @param String[] $dictionary
     * @return Integer
     */
    function minExtraChar($s, $dictionary) {
        $n = strlen($s);
        // Initialize the dp array with large values (representing infinity)
        $dp = array_fill(0, $n + 1, $n);
        $dp[0] = 0; // Base case: no extra characters for an empty string

        // Convert dictionary array to a hash set for faster lookups
        $dict = array_flip($dictionary);

        // Iterate over the string
        for ($i = 1; $i <= $n; $i++) {
            // Assume the current character is extra
            $dp[$i] = $dp[$i - 1] + 1;

            // Check all possible substrings ending at index i-1
            for ($j = 0; $j < $i; $j++) {
                $substring = substr($s, $j, $i - $j);
                if (isset($dict[$substring])) {
                    $dp[$i] = min($dp[$i], $dp[$j]);
                }
            }
        }

        // The answer is the minimum extra characters at the end of the string
        return $dp[$n];
    }
}