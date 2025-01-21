<?php

class Solution {

    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return String[]
     */
    function wordSubsets($words1, $words2) {
        // Step 1: Build a frequency map for the maximum counts of characters in words2
        $freqB = [];
        foreach ($words2 as $word) {
            $count = count_chars($word, 1); // get character counts for each word in words2
            foreach ($count as $char => $c) {
                $freqB[$char] = max(isset($freqB[$char]) ? $freqB[$char] : 0, $c);
            }
        }

        // Step 2: Check each word in words1
        $result = [];
        foreach ($words1 as $word) {
            $countA = count_chars($word, 1); // get character counts for the word in words1
            $isValid = true;

            // Step 3: Check if the word in words1 meets the required character frequencies
            foreach ($freqB as $char => $freq) {
                if (isset($countA[$char]) && $countA[$char] >= $freq) {
                    continue;
                }
                $isValid = false;
                break;
            }

            // Step 4: If valid, add the word to the result
            if ($isValid) {
                $result[] = $word;
            }
        }

        return $result;
    }
}