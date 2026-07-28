<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function smallestPalindrome(string $s): string
    {
        $n = strlen($s);

        // Count frequency of each character
        $freq = array_fill(0, 26, 0);
        for ($i = 0; $i < $n; $i++) {
            $freq[ord($s[$i]) - ord('a')]++;
        }

        // Build the first half
        $firstHalf = [];
        $middle = '';

        for ($i = 0; $i < 26; $i++) {
            // Add half of the characters to the first half
            $half = intdiv($freq[$i], 2);
            for ($j = 0; $j < $half; $j++) {
                $firstHalf[] = chr(ord('a') + $i);
            }

            // If odd count, this character will be the middle
            if ($freq[$i] % 2 == 1) {
                $middle = chr(ord('a') + $i);
            }
        }

        // Build the palindrome
        $result = implode('', $firstHalf) . $middle . implode('', array_reverse($firstHalf));

        return $result;
    }
}