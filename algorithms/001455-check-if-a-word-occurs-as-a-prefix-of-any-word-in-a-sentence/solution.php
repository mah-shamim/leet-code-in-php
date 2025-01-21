<?php

class Solution {

    /**
     * @param String $sentence
     * @param String $searchWord
     * @return Integer
     */
    function isPrefixOfWord($sentence, $searchWord) {
        // Split the sentence into words
        $words = explode(" ", $sentence);

        // Iterate over the words to check if searchWord is a prefix
        foreach ($words as $index => $word) {
            // Check if searchWord is a prefix of the word
            if (substr($word, 0, strlen($searchWord)) === $searchWord) {
                // Return the 1-indexed position
                return $index + 1;
            }
        }

        // If no word contains searchWord as a prefix, return -1
        return -1;
    }
}