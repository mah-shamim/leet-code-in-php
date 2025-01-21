<?php

class Solution {

    /**
     * @param String $sentence
     * @return Boolean
     */
    function isCircularSentence($sentence) {
        // Split the sentence into words
        $words = explode(" ", $sentence);

        // Loop through the words and check the circular condition
        for ($i = 0; $i < count($words); $i++) {
            // Get the last character of the current word
            $lastChar = substr($words[$i], -1);

            // Determine the next word (wrap around if we're at the last word)
            $nextWord = $words[($i + 1) % count($words)];

            // Get the first character of the next word
            $firstChar = substr($nextWord, 0, 1);

            // Check if the last character of the current word matches the first character of the next word
            if ($lastChar !== $firstChar) {
                return false;
            }
        }

        return true;
    }
}