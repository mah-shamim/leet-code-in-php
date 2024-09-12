<?php

class Solution {

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    function countConsistentStrings($allowed, $words) {
        // Step 1: Create a set (array) for allowed characters
        $allowedSet = [];
        for ($i = 0; $i < strlen($allowed); $i++) {
            $allowedSet[$allowed[$i]] = true;
        }

        // Step 2: Initialize counter for consistent strings
        $consistentCount = 0;

        // Step 3: Check each word in words array
        foreach ($words as $word) {
            $isConsistent = true;
            for ($j = 0; $j < strlen($word); $j++) {
                // If the character is not in the allowed set, mark the word as inconsistent
                if (!isset($allowedSet[$word[$j]])) {
                    $isConsistent = false;
                    break;
                }
            }
            // Step 4: If the word is consistent, increment the counter
            if ($isConsistent) {
                $consistentCount++;
            }
        }

        // Step 5: Return the count of consistent strings
        return $consistentCount;
    }
}