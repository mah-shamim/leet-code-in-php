<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkValidString($s) {
        $minOpen = 0;  // Minimum number of open parentheses
        $maxOpen = 0;  // Maximum number of open parentheses

        // Iterate through the string
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                // Treat '(' as an open parenthesis
                $minOpen++;
                $maxOpen++;
            } elseif ($s[$i] == ')') {
                // Treat ')' as closing a parenthesis
                $minOpen = max(0, $minOpen - 1);  // Ensure minOpen doesn't go below 0
                $maxOpen--;
            } else {
                // Treat '*' as both opening '(' and closing ')' or an empty string ""
                $minOpen = max(0, $minOpen - 1);  // Consider '*' as ')'
                $maxOpen++;  // Consider '*' as '('
            }

            // If at any point maxOpen becomes negative, it's invalid
            if ($maxOpen < 0) {
                return false;
            }
        }

        // In the end, minOpen should be 0 for the string to be valid
        return $minOpen == 0;

    }
}