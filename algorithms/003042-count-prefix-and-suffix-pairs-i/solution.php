<?php

class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function countPrefixSuffixPairs($words) {
        // Initialize a counter to keep track of valid index pairs
        $count = 0;

        // Loop through all index pairs (i, j) where i < j
        for ($i = 0; $i < count($words); $i++) {
            for ($j = $i + 1; $j < count($words); $j++) {
                // Check if words[i] is both a prefix and a suffix of words[j]
                if ($this->isPrefixAndSuffix($words[$i], $words[$j])) {
                    $count++;
                }
            }
        }

        return $count;
    }

    /**
     * Function to check if str1 is both a prefix and a suffix of str2
     *
     * @param $str1
     * @param $str2
     * @return bool
     */
    function isPrefixAndSuffix($str1, $str2) {
        // Check if str1 is a prefix and a suffix of str2
        return (substr($str2, 0, strlen($str1)) === $str1 && substr($str2, -strlen($str1)) === $str1);
    }
}