<?php

class Solution {

    /**
     * @param String[] $words
     * @param String $pref
     * @return Integer
     */
    function prefixCount($words, $pref) {
        // Initialize count variable
        $count = 0;

        // Iterate through each word in the words array
        foreach ($words as $word) {
            // Check if the word starts with the prefix using substr
            if (substr($word, 0, strlen($pref)) === $pref) {
                // Increment count if the word contains the prefix
                $count++;
            }
        }

        // Return the final count
        return $count;
    }
}