<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function takeCharacters($s, $k) {
        $n = strlen($s);  // Length of the string
        $ans = $n;
        $count = [0, 0, 0];  // To count occurrences of 'a', 'b', 'c'

        // Count occurrences of each character
        for ($i = 0; $i < $n; $i++) {
            $count[ord($s[$i]) - ord('a')]++;
        }

        // If any character count is less than k, return -1
        if ($count[0] < $k || $count[1] < $k || $count[2] < $k) {
            return -1;
        }

        // Sliding window approach
        $l = 0; // Left pointer
        for ($r = 0; $r < $n; $r++) { // Right pointer
            $count[ord($s[$r]) - ord('a')]--;
            while ($count[ord($s[$r]) - ord('a')] < $k) {
                $count[ord($s[$l]) - ord('a')]++;
                $l++;
            }
            $ans = min($ans, $n - ($r - $l + 1));
        }

        return $ans;
    }
}