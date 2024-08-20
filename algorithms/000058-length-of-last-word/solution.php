<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        // Trim the string to remove any leading or trailing spaces
        $trimmed = trim($s);

        // Split the string by spaces
        $words = explode(' ', $trimmed);

        // Get the last word from the array
        $lastWord = end($words);

        // Return the length of the last word
        return strlen($lastWord);
    }
}