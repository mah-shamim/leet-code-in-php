<?php

class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
    function commonChars($words) {
        // Initialize a count array for 26 letters with a high number to represent infinity.
        $letterCount = array_fill(0, 26, PHP_INT_MAX);

        // Loop through each word in the words vector.
        foreach ($words as $word) {
            // Local count for letters in the current word.
            $wordLetterCount = array_fill(0, 26, 0);

            // Count each letter in the current word.
            foreach (str_split($word) as $letter) {
                ++$wordLetterCount[ord($letter) - ord('a')];
            }

            // Compare counts for each letter with the global count and take the minimum.
            for ($i = 0; $i < 26; ++$i) {
                $letterCount[$i] = min($letterCount[$i], $wordLetterCount[$i]);
            }
        }

        // Prepare the result vector to store common letters.
        $result = [];
        for ($i = 0; $i < 26; ++$i) {
            // Add the appropriate number of the current letter to the result.
            while ($letterCount[$i] > 0) {
                $result[] = chr($i + ord('a'));
                --$letterCount[$i];
            }
        }
        return $result; // Return the final result.
    }
}