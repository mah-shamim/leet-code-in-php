<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minLength($s) {
        // Initialize an empty stack
        $stack = [];

        // Traverse through each character in the input string
        for ($i = 0; $i < strlen($s); $i++) {
            $currentChar = $s[$i];

            // Check if the top of the stack forms "AB" or "CD" with the current character
            if (!empty($stack)) {
                $topChar = end($stack);

                // Remove "AB" or "CD" if found
                if (($topChar == 'A' && $currentChar == 'B') || ($topChar == 'C' && $currentChar == 'D')) {
                    array_pop($stack); // Remove the top element from the stack
                    continue; // Skip adding the current character
                }
            }

            // If no removals, add the current character to the stack
            $stack[] = $currentChar;
        }

        // The minimum possible length is the size of the stack
        return count($stack);
    }
}