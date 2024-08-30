<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $charCount = [];
        $length = 0;
        $oddCountFound = false;

        // Count the occurrences of each character
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (!isset($charCount[$char])) {
                $charCount[$char] = 0;
            }
            $charCount[$char]++;
        }

        // Calculate the length of the longest palindrome
        foreach ($charCount as $count) {
            if ($count % 2 == 0) {
                // Add the entire count if it's even
                $length += $count;
            } else {
                // Add the largest even number less than count
                $length += $count - 1;
                $oddCountFound = true;
            }
        }

        // If there was at least one character with an odd count, we can place one in the middle
        if ($oddCountFound) {
            $length += 1;
        }

        return $length;
    }
}