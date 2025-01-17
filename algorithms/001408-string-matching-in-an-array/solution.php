<?php

class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
    function stringMatching($words) {
        $result = [];

        // Loop through each word in the array
        for ($i = 0; $i < count($words); $i++) {
            // For each word, compare it with every other word
            for ($j = 0; $j < count($words); $j++) {
                // Skip comparing the word with itself
                if ($i != $j) {
                    // Check if words[$i] is a substring of words[$j]
                    if (strpos($words[$j], $words[$i]) !== false) {
                        $result[] = $words[$i];
                        break; // No need to check further for this word
                    }
                }
            }
        }

        // Return the result array with matching substrings
        return $result;
    }
}