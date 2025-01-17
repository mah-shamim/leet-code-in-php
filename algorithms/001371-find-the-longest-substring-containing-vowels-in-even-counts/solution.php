<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function findTheLongestSubstring($s) {
        $n = strlen($s);
        $mask = 0;  // Initialize the bitmask
        $longest = 0;  // This will store the longest valid substring length
        $vowels = ['a' => 0, 'e' => 1, 'i' => 2, 'o' => 3, 'u' => 4];

        // Initialize the hash table to store the first occurrence of each bitmask
        // At mask = 0 (start), we have already seen it at index -1 (before any characters)
        $mask_position = array();
        $mask_position[0] = -1;

        for ($i = 0; $i < $n; $i++) {
            $ch = $s[$i];

            // If the character is a vowel, flip its corresponding bit in the bitmask
            if (isset($vowels[$ch])) {
                $mask ^= (1 << $vowels[$ch]);
            }

            // Check if this bitmask has been seen before
            if (isset($mask_position[$mask])) {
                // Calculate the length of the substring from the previous occurrence
                $longest = max($longest, $i - $mask_position[$mask]);
            } else {
                // Record the first time this bitmask is encountered
                $mask_position[$mask] = $i;
            }
        }

        return $longest;

    }
}