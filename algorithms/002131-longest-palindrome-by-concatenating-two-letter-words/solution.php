<?php

class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function longestPalindrome($words) {
        $freq = array();
        foreach ($words as $word) {
            if (isset($freq[$word])) {
                $freq[$word]++;
            } else {
                $freq[$word] = 1;
            }
        }

        $total = 0;
        $has_center = false;

        foreach ($freq as $word => $count) {
            if ($word[0] == $word[1]) { // Check if the word is a palindrome
                $pairs = intval($count / 2);
                $total += $pairs * 4; // Each pair contributes 4 characters
                if ($count % 2 == 1) {
                    $has_center = true;
                }
            } else {
                $reversed = strrev($word);
                if (isset($freq[$reversed]) && $word < $reversed) {
                    // Ensure each pair is processed once
                    $min = min($count, $freq[$reversed]);
                    $total += $min * 4; // Each pair contributes 4 characters
                }
            }
        }

        if ($has_center) {
            $total += 2; // Add the center palindrome if possible
        }

        return $total;
    }
}