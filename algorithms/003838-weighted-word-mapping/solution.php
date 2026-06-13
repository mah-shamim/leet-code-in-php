<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer[] $weights
     * @return String
     */
    function mapWordWeights(array $words, array $weights): string
    {
        $result = '';

        foreach ($words as $word) {
            $sum = 0;
            // Calculate weight of the word
            for ($i = 0; $i < strlen($word); $i++) {
                $charIndex = ord($word[$i]) - ord('a');
                $sum += $weights[$charIndex];
            }

            // Get modulo 26
            $modValue = $sum % 26;

            // Map to reverse alphabet: 0 -> 'z', 1 -> 'y', ..., 25 -> 'a'
            $mappedChar = chr(ord('z') - $modValue);

            $result .= $mappedChar;
        }

        return $result;
    }
}