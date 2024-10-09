<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minAddToMakeValid($s) {
        $balance = 0;  // Keeps track of the balance between '(' and ')'
        $additions = 0;  // Number of additions needed to balance the parentheses

        // Iterate through each character of the string
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                $balance++;  // Increment balance for '('
            } else {
                $balance--;  // Decrement balance for ')'
                // If balance goes negative, it means there's an unmatched ')'
                if ($balance < 0) {
                    $additions++;  // Add an opening parenthesis
                    $balance = 0;  // Reset balance to 0
                }
            }
        }

        // Any remaining positive balance indicates unmatched '('
        return $additions + $balance;
    }
}