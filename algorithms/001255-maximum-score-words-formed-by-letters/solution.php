<?php

class Solution {

    /**
     * @param String[] $words
     * @param String[] $letters
     * @param Integer[] $score
     * @return Integer
     */
    function maxScoreWords($words, $letters, $score) {
        $letterCounts = array_fill(0, 26, 0); // Array to hold counts of each letter in 'letters'

        // Count the occurrence of each letter in 'letters'

        foreach ($letters as $letter) {

            $letterCounts[ord($letter) - ord('a')]++;
        }

        $numWords = count($words); // Total number of words
        $maxScore = 0; // Variable to store the maximum score

        // Loop through all combinations of words

        for ($combination = 0; $combination < (1 << $numWords); ++$combination) {

            $wordCounts = array_fill(0, 26, 0); // Current letter counts for the current combination of words

            // Build the count for the current combination

            for ($wordIndex = 0; $wordIndex < $numWords; ++$wordIndex) {

                // Check if the word at wordIndex is included in the current combination

                if ($combination >> $wordIndex & 1) {

                    // If so, count each letter in the word

                    foreach (str_split($words[$wordIndex]) as $letter) {

                        $wordCounts[ord($letter) - ord('a')]++;
                    }

                }

            }

            $isValidCombination = true; // Flag to check if the combination is valid
            $currentScore = 0; // Score for the current combination

            for ($letterIndex = 0; $letterIndex < 26; ++$letterIndex) {

                // If any letter count exceeds what is available, the combination is invalid

                if ($wordCounts[$letterIndex] > $letterCounts[$letterIndex]) {

                    $isValidCombination = false;
                    break; // No need to continue if the combination is invalid
                }

                // Calculate score for the current combination

                $currentScore += $wordCounts[$letterIndex] * $score[$letterIndex];
            }

            // If the combination is valid and the score is higher than the maximum found so far, update maxScore

            if ($isValidCombination && $maxScore < $currentScore) {

                $maxScore = $currentScore;
            }
        }

        // Return the maximum score possible with the given words and letters
        return $maxScore;

    }
}