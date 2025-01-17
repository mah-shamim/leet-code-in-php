<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2) {
        $len1 = strlen($s1);
        $len2 = strlen($s2);

        // If s1 is longer than s2, s2 can't contain any permutation of s1
        if ($len1 > $len2) {
            return false;
        }

        // Initialize frequency arrays for s1 and the current window of s2
        $count1 = array_fill(0, 26, 0);
        $count2 = array_fill(0, 26, 0);

        // Fill the count array for s1 and the first window of s2
        for ($i = 0; $i < $len1; $i++) {
            $count1[ord($s1[$i]) - ord('a')]++;
            $count2[ord($s2[$i]) - ord('a')]++;
        }

        // Check if the first window matches
        if ($count1 == $count2) {
            return true;
        }

        // Start sliding the window
        for ($i = $len1; $i < $len2; $i++) {
            // Add the current character to the window
            $count2[ord($s2[$i]) - ord('a')]++;

            // Remove the character that is left out of the window
            $count2[ord($s2[$i - $len1]) - ord('a')]--;

            // Check if the window matches
            if ($count1 == $count2) {
                return true;
            }
        }

        // If no matching window was found, return false
        return false;
    }
}