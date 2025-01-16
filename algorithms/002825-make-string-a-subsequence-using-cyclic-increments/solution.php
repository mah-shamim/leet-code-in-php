<?php

class Solution {

    /**
     * @param String $str1
     * @param String $str2
     * @return Boolean
     */
    function canMakeSubsequence($str1, $str2) {
        $n = strlen($str1);
        $m = strlen($str2);
        $i = 0;
        $j = 0;

        // Traverse through both strings
        while ($i < $n && $j < $m) {
            // Check if characters match or can be incremented to match
            if ($str1[$i] == $str2[$j] || (ord($str1[$i]) + 1 - ord('a')) % 26 == (ord($str2[$j]) - ord('a')) % 26) {
                // Move both pointers
                $i++;
                $j++;
            } else {
                // Move pointer i in str1
                $i++;
            }
        }

        // If j reached the end of str2, we managed to match all characters
        return $j == $m;
    }
}