<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $n = strlen($s);
        $maxLength = 0;
        $charIndexMap = [];
        $start = 0;

        for ($end = 0; $end < $n; $end++) {
            $char = $s[$end];

            // If the character is already in the map and its index is within the current window
            if (isset($charIndexMap[$char]) && $charIndexMap[$char] >= $start) {
                // Move the start right after the last occurrence of current character
                $start = $charIndexMap[$char] + 1;
            }

            // Update the latest index of the character
            $charIndexMap[$char] = $end;

            // Update the maximum length of substring found
            $maxLength = max($maxLength, $end - $start + 1);
        }

        return $maxLength;

    }
}